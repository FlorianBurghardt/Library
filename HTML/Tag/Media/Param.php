<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Param extends Body
{
	#region properties
	protected string|null $name		/** @property Specifies-the-name-of-the-parameter */;
	protected string|null $value	/** @property Specifies-the-value-of-the-parameter */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Param; }
		parent::__construct($input, $tagID);
		$this->mapParam();
	}
	#endregion

	#region getter / setter
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getValue(): string|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(string|null $value): void { $this->value = $value; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapParam(): void
	{
		if (isset($this->input['name'])) { $this->name = $this->input['name']; }
		if (isset($this->input['value'])) { $this->value = $this->input['value']; }
	}
	#endregion
}
?>