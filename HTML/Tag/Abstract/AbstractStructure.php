<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Abstract;

use de\fburghardt\Library\Enum\StatusCode;
use de\fburghardt\Library\Exception\ConflictException;
use de\fburghardt\Library\Exception\NotAcceptableException;
use de\fburghardt\Library\Exception\NotFoundException;
use de\fburghardt\Library\Exception\PayloadTooLargeException;
use de\fburghardt\Library\Helper\JSON;
use de\fburghardt\Library\HTML\Enum\ContentType;
use de\fburghardt\Library\Response\ForbiddenMethods;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/07/15
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 * @throws PayloadTooLargeException
 * @throws NotFoundException
 * @throws ForbiddenException
 */
abstract class AbstractStructure extends ForbiddenMethods
{
	#region properties
	protected string $templateFolder;
	protected string $templateFile;
	protected string $tagType;
	protected bool $onlyOpenTag = false;
	protected array|null $input = null;

	protected static array $allTags = [];
	protected static int $tagCount = 0;

    private array $tags = [];
	private string $openTag = '';
	private string $closeTag = '';
	#endregion

	#region constructor
	/**
	 * Abstract constructor for several HTML Tag generation Classes
	 * @param array|null $input Named input array for tag attributes
	 * @param string|null $tagID Tag ID has to be unique when used otherwise a unique ID will be generated
	 * @property string $this->tagType
	 * - Have to be set in child constructor before calling parent constructor.
	 * - Defines tag name of HTML-Element Tag.
	 * - Example: $this->tagType = 'Body' => \<body \%ATTRIBUTES\%\>\%CONTENT\%\<\/body\>
	 * @property bool $this->onlyOpenTag (Default: false)
	 * - Have to be set in child constructor before calling parent constructor.
	 * - Generate only open tag (self-closing tag).
	 * - Example: $onlyOpenTag = true => \<meta\/\>
	 * @example costructor Complete child constructor example:
	 * - public function __construct(array|null $input = null, string|null $tagID = null)
	 * - {
	 * - $this->input = $input;
	 * - $this->map();
	 * - if (!isset($this->tagType)) { $this->tagType = 'Meta'; }
	 * - $this->onlyOpenTag = true;
	 * - parent::__construct($this->input, $tagID);
	 * - }
	 * @throws NotAcceptableException TagType is not set
	 */
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		$this->setRootPath();

		// Set default templates
		if (!isset($this->tagType))
		{
			throw new NotAcceptableException(
				'TagType is not set',
				9100);
		}
		$this->addTagID($tagID);

		$this->input = $input;

		if (!isset($this->templateFolder)) { $this->templateFolder = 'de/fburghardt/Library/HTML/Template'; }
		$this->loadTemplate();
	
		if (isset($input['innerContent'])) { $this->createContent($input['innerContent']); }
	}
	#endregion

	#region getter / setter
	public function getTemplate(): array { return ['TemplateFolder'=>$this->templateFolder,'TemplateFile'=>$this->templateFile]; }
	public function setTemplate(string|null $templateFolder = null, string|null $templateFile = null): void
	{
		if (!is_null($templateFolder)) { $this->templateFolder = $templateFolder; }
		if (!is_null($templateFile)) { $this->templateFile = $templateFile; }
		$this->loadTemplate();
	}
    public function getTags(): array { return $this->tags; }
	#endregion

	#region static getter / setter
	public static function getAllTags(): array { return self::$allTags; }
	public static function getAllTagNames(): array
	{
		foreach (self::$allTags as $tagID => $tag)
		{
			$allTagNames[] = $tagID;
		}
		return $allTagNames;
	}
	public static function getTagById(string $tagID): AbstractStructure { return self::$allTags[$tagID]; }
	#endregion

	#region abstract methods
	/**
	 * Format Attributes into string for HTML Tag. Don't call function directly. It will be called from display() method und replace the placeholder %ATTRIBUTES%
	 * @return string
	 * @example tag Input template looks like: \<body %ATTRIBUTES% \> %DIVIDER% \<\/body\>.
	 * @example tag Result template will be: \<body id="1a" lang="en" \> %DIVIDER% \<\/body\>.
	 * @example tag Usage:
	 * - private string|null $id = '1a';
	 * - private string|null $lang = 'en';
	 * - protected function formatAttributes(): string
	 * - {
	 * - $result = '';
	 * - if (isset($this->id)) { $result .= ' id="'.$this->id.'" '; }
	 * - if (isset($this->lang)) { $result .= ' lang="'.$this->lang.'" '; }
	 * - return $result;
	 * - }
	 */
	protected abstract function formatAttributes(string $result = ''): string;
	#endregion

	#region final methods
	/**
	 * Load JSON files to create tags
	 * @param AbstractStructure|array|string $content
	 * - (AbstractStructure): Child class of AbstractStructure
	 * - (array): String-array of JSON files
	 * - (string): One JSON file or tag-content
	 * @param string $contentType
	 * - (string) => 'CONTENT' [Default]: For tag-elemtent(AbstractStructure) or tag-content string. Add to end of tag.
	 * - (string) => 'JSON_FILE': For JSON file or JSON file array
	 * @param int|null $position
	 * - (int) >= 0: Add to target position in current array order
	 * - (null) [Default]: Add at the end of current array
	 * @return void
	 * @throws NotAcceptableException Given content type is not valid
	 */
	public final function add(AbstractStructure|array|string $content, string $contentType = 'CONTENT', int|null $position = null): void
	{
		$type = null;
		if (is_string($contentType)) { $type = ContentType::tryFrom($contentType); }
		if (is_null($type)) { $type = $contentType; }

		switch ($type)
		{
			// JSON
			case ContentType::CONTENT:
				if (!is_null($position) && $position >= 0)
				{
					$temp[] = $content;
					array_splice($this->tags, $position, 0, $temp);
				}
				else { $this->tags[] = $content; }
				 break;

				 // Tag / Content
			case ContentType::JSON_FILE:
				if (is_array($content))
				{
					$contentArray = [];
					foreach($content as $jsonFilePath)
					{
						$contentArray = array_merge($contentArray, $this->convertJSON($jsonFilePath));
					}
				}
				else { $contentArray = $this->convertJSON($content); }
				$this->createContent($contentArray);
				 break;
			default:
				throw new NotAcceptableException(
					'Given content type: "'.$type.'" is no valid enum value',
					9106);
				break;
		}
	}

	/**
	 * Set tag attributes and display content
	 * @return void
	 */
    public final function display(): void
    {
		// Print open tag to screen
		$this->openTag = str_replace('%ATTRIBUTES%', $this->formatAttributes(), $this->openTag);
		$this->openTag = $this->cleanPlaceholders($this->openTag);
        echo $this->openTag;

		// Print child tags and contents to screen
        foreach ($this->tags as $child)
		{
			if (is_string($child)) { echo $child; }
            else { $child->display(); }
        }

		// Print close tag to screen
		$this->closeTag = $this->cleanPlaceholders($this->closeTag);
        echo $this->closeTag;
    }
	
	/**
	 * Get all possible tag attributes with their required types
	 * @return array Properties: 'Name' => [' Property['Type], Property[Description] ]
	 */
	public final function getAllPossibleAttributes(): array
	{
		$reflector = new \ReflectionClass(get_called_class());
		$properties = $reflector->getProperties(\ReflectionProperty:: IS_PRIVATE | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PUBLIC);
		$skip = ['', 'templateFolder', 'templateFile', 'onlyOpenTag', 'input', 'tagType', 'allTags', 'tagCount', 'tags', 'openTag', 'closeTag'];
		$result = [];
		foreach ($properties as $property)
		{
			if (!array_search($property->getName(), $skip))
			{
				$propertyName = $property->getName();
				$propertyType = $property->getType()->getName();
				$docDescription = '';
				$docComment = $property->getDocComment();
				if (preg_match('/@property\s+([^\s]+)/', $docComment, $matches)) { $docDescription = $matches[1]; }

				if (!empty($docDescription)) { $result[$propertyName] = ['type'=>$propertyType, 'description'=>$docDescription]; }
				else { $result[$propertyName] = ['type'=>$propertyType]; }
			}
		}
		return $result;
	}

	/**
	 * Convert JSON tempalate to Array
	 * @return array
	 * @throws NotFoundException JSON Tag template not found
	 */
	private final function convertJSON(string $jsonFilePath): array
	{
		$json = JSON::decode(file_get_contents($jsonFilePath),true);
		if (is_bool($json) && $json === false)
		{
			throw new NotFoundException(
				'JSON Tag template not found: '.$jsonFilePath,
				9103);
		}
		return $json;
	}

	/** 
	 * Recursive function to create tags from $tagArray
	 * @param array $tagArray Array of tags
	 * @return void
	 * @throws PayloadTooLargeException Max recursion depth reached
	 * @throws NotFoundException Class not found
	 */
	private final function createContent(array $contentArray, int $maxRecursion = 256): void
	{
		if ($maxRecursion <= 0)
		{
			throw new PayloadTooLargeException(
				'Max recursion depth reached',
				9104);
		}
		$maxRecursion--;

		foreach($contentArray as $contentItem)
		{
			// Check contentItem type
			if (isset($contentItem['tagName']))
			{
				// Create class name
				if (isset($contentItem['tagDirectory'])) { $class = $contentItem['tagDirectory'].'\\'.$contentItem['tagName']; }
				else { $class = str_replace('\\Abstract', '', __NAMESPACE__).'\\'.$contentItem['tagName']; }

				// Create instance of class
				if (class_exists($class))
				{
					$object = new $class($contentItem['input'], $contentItem['tagID']);
					$position = (isset($contentItem['position'])) ? (int)$contentItem['position'] : null;
					$this->add($object, 'CONTENT', $position);

					// Add child tags
					if (isset($contentItem['innerContent'])) { $object->createContent($contentItem['innerContent'], $maxRecursion); }
				}
				else
				{
					throw new NotFoundException(
						'Class not found: '.$class,
						9105);
				}
			}
			else if (isset($contentItem['content']))
			{
				$position = (isset($contentItem['position'])) ? (int)$contentItem['position'] : null;
				$this->add($contentItem['content'], 'CONTENT', $position);
			}
			else
			{
				throw new NotFoundException(
					'Invalid scheme: '.JSON::encode($contentItem),
					9106);
			}
		}
	}

	/**
	 * Remove all not used placeholders from the template
	 * @param string $template Template to clean
	 * @return string Cleaned template
	 */
	private final function cleanPlaceholders(string $template): string
	{
		return preg_replace("/\%[^\%]*\%/", '', $template);
	}

	/**
	 * Load template file and split into $before and $after divided by %DIVIDER% if found else $after is empty string
	 * @return void
	 * @throws NotFoundException Template file not found
	 */
	private final function loadTemplate(): void
	{

		// Load custom template
		if (isset($this->templateFile)) { $tepmlatePath = __ROOT__.'/'.$this->templateFolder.'/'.$this->templateFile; }
		// Load default template
		else
		{
			$defaultFile = ($this->onlyOpenTag) ? 'single.html' : 'double.html';
			$tepmlatePath = __ROOT__.'/'.$this->templateFolder.'/'.$defaultFile;
		}

		if (file_exists($tepmlatePath))
		{
			$templateContent = file_get_contents($tepmlatePath);

			if (stripos($templateContent, '%TAG%')) { $templateContent = str_replace('%TAG%', strtolower($this->tagType), $templateContent); }

			$divider = (stripos($templateContent, '%DIVIDER%')) ? stripos($templateContent, '%DIVIDER%') : strlen($templateContent);
			
			$this->openTag = substr($templateContent, 0, $divider);
			$this->closeTag = ($divider) ? substr($templateContent, $divider + 9) : '';
		}
		else
		{
			throw new NotFoundException(
				'Template file not found: '.$tepmlatePath,
				9102);
		}
	}

	/**
	 * Set root path __ROOT__ variable
	 * @return void
	 */
	private final function setRootPath(): void
	{
		if (!is_string(__ROOT__)) { define('__ROOT__', dirname(dirname(dirname(__DIR__)))); }
	}

	/**
	 * Add new tag to central handling list
	 * @param string $tagID Unique tag ID
	 * @return void
	 * @throws ConflictException Tag ID already exists
	 */
	private final function addTagID(string|null $tagID): void
	{
		if (!is_null($tagID) && isset(self::$allTags[$tagID]))
		{
			throw new ConflictException(
				'Tag ID ['.$tagID.'] already exists',
				9101);
		}
		else if (!is_null($tagID)) { self::$allTags[$tagID] = $this; }
		else
		{
			self::$allTags[self::$tagCount.'_'.$this->tagType] = $this;
			self::$tagCount++;
		}
	}
	#endregion
}
?>