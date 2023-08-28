<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag;

use de\fburghardt\Library\HTML\DTO\AriaDTO;
use de\fburghardt\Library\HTML\DTO\DataDTO;
use de\fburghardt\Library\HTML\DTO\JavaScriptBodyEventDTO;
use de\fburghardt\Library\HTML\DTO\JavaScriptEventDTO;
use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractStructure;
#endregion

class Body extends AbstractStructure
{
	#region properties
	protected string|null $id				/** @property ID-of-the-html-element */;
	protected string|null $class			/** @property Classes-of-the-html-element-for-CSS-deklarations */;
	protected string|null $title			/** @property Title-for-screen-reader-access */;
	protected string|null $style			/** @property Inline-CSS-styles */;
	protected string|null $accesskey		/** @property Shortcut-for-keyboard-access */;
	protected string|null $dropzone			/** @property Droparea-for-dragable-elements */;
	protected string|null $dir				/** @property Defines-the-reading-direction-(ltr-rtl)-for-this-element */;
	protected string|null $role				/** @property Specifies-the-role-of-the-link */;
	protected int|null $tabindex			/** @property Tab-index-for-tab-navigation-order */;
	protected bool $contenteditable = false	/** @property Content-of-the-element-is-editable */;
	protected bool $draggable = false		/** @property Element-is-dragable */;
	protected bool $hidden = false			/** @property Element-is-hidden-when-value-is-(true) */;
	protected bool $translate = false		/** @property Element-should-be-translated-when-language-changed */;
	protected array|null $data				/** @property Data-attributes-array-store-custom-data.-Takes-Array-of-JSON-Objects:-['{"name":"dataName","value":"dataValue"}','{...}'].-Adds-data-attributes-like:(data-dataName="dataValue") */;
	protected array|null $aria				/** @property Aria-attributes-array-store-custom-data-for-content-management-via-ARIA-['{"name":"arianame","value":"ariaValue"}','{...}'].-Adds-aria-attributes-like:(aria-ariaName="ariaValue") */;
	protected array|null $events			/** @property JavaScript-Body-Event-handler */;
	private JavaScriptBodyEventDTO $bodyEvents;
	private JavaScriptEventDTO $globalEvents;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Body; }
		parent::__construct($input, $tagID);
		$this->mapBody();
		if (isset($this->input['data'])) { $this->mapData($this->input['data']); }
		if (isset($this->input['aria'])) { $this->mapAria($this->input['aria']); }
		if (isset($this->input['events']))
		{
			if ($this->isBodyClass()) { $this->mapBodyEvents($this->input['events']); }
			$this->mapEvents($this->input['events']);
		}
	}
	#endregion

	#region getter / setter
	public function getId(): string|null { return (isset($this->id)) ? $this->id : null; }
	public function setId(string|null $id): void { $this->id = $id; }
	public function getClass(): string|null { return (isset($this->class)) ? $this->class : null; }
	public function setClass(string|null $class): void { $this->class = $class; }
	public function getTitle(): string|null { return (isset($this->title)) ? $this->title : null; }
	public function setTitle(string|null $title): void { $this->title = $title; }
	public function getStyle(): string|null { return (isset($this->style)) ? $this->style : null; }
	public function setStyle(string|null $style): void { $this->style = $style; }
	public function getAccesskey(): string|null { return (isset($this->accesskey)) ? $this->accesskey : null; }
	public function setAccesskey(string|null $accesskey): void { $this->accesskey = $accesskey; }
	public function getDropzone(): string|null { return (isset($this->dropzone)) ? $this->dropzone : null; }
	public function setDropzone(string|null $dropzone): void { $this->dropzone = $dropzone; }
	public function getDir(): string|null { return (isset($this->dir)) ? $this->dir : null; }
	public function setDir(string|null $dir): void { $this->dir = $dir; }
	public function getRole(): string|null { return (isset($this->role)) ? $this->role : null; }
	public function setRole(string|null $role): void { $this->role = $role; }
	public function getTabindex(): int|null { return (isset($this->tabindex)) ? $this->tabindex : null; }
	public function setTabindex(int|null $tabindex): void { $this->tabindex = $tabindex; }
	public function getContenteditable(): bool { return $this->contenteditable; }
	public function setContenteditable(bool $contenteditable): void { $this->contenteditable = $contenteditable; }
	public function getDraggable(): bool { return $this->draggable; }
	public function setDraggable(bool $draggable): void { $this->draggable = $draggable; }
	public function getHidden(): bool { return $this->hidden; }
	public function setHidden(bool $hidden): void { $this->hidden = $hidden; }
	public function getTranslate(): bool { return $this->translate; }
	public function setTranslate(bool $translate): void { $this->translate = $translate; }
	public function getData(): array|null { return (isset($this->data)) ? $this->data : null; }
	public function addData(array|null $data): void { $this->mapData($data); }
	public function getAria(): array|null { return (isset($this->aria)) ? $this->aria : null; }
	public function addAria(array|null $aria): void { $this->mapAria($aria); }
	public function getEvents(): array|null { return (isset($this->events)) ? $this->events : null; }
	public function addEvents(array|null $events): void
	{
		if ($this->isBodyClass()) { $this->mapBodyEvents($events); }
		$this->mapEvents($events);
	}
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->id)) { $result .= ' id="'.$this->id.'"'; }
		if (isset($this->class)) { $result .= ' class="'.$this->class.'"'; }
		if (isset($this->title)) { $result .= ' title="'.$this->title.'"'; }
		if (isset($this->style)) { $result .= ' style="'.$this->style.'"'; }
		if (isset($this->accesskey)) { $result .= ' accesskey="'.$this->accesskey.'"'; }
		if (isset($this->dropzone)) { $result .= ' dropzone="'.$this->dropzone.'"'; }
		if (isset($this->dir)) { $result .= ' dir="'.$this->dir.'"'; }
		if (isset($this->role)) { $result .= ' role="'.$this->role.'"'; }
		if (isset($this->tabindex)) { $result .= ' tabindex="'.$this->tabindex.'"'; }
		if ($this->contenteditable === true) { $result .= ' contenteditable'; }
		if ($this->draggable === true) { $result .= ' draggable'; }
		if ($this->hidden === true) { $result .= ' hidden'; }
		if ($this->translate === true) { $result .= ' translate'; }
		if (isset($this->data))
		{
			foreach ($this->data as $item) { $result .= ' data-'.$item->name.'="'.$item->value.'"'; }
		}
		if (isset($this->aria))
		{
			foreach ($this->aria as $item) { $result .= ' aria-'.$item->name.'="'.$item->value.'"'; }
		}
		if (isset($this->events))
		{
			foreach ($this->events as $key => $value) { $result .= $key.'="'.$value.'"'; }
		}
		return $result;
	}

	protected function mapBody(): void
	{
		if (isset($this->input['id'])) { $this->id = $this->input['id']; }
		if (isset($this->input['class'])) { $this->class = $this->input['class']; }
		if (isset($this->input['title'])) { $this->title = $this->input['title']; }
		if (isset($this->input['style'])) { $this->style = $this->input['style']; }
		if (isset($this->input['accesskey'])) { $this->accesskey = $this->input['accesskey']; }
		if (isset($this->input['dropzone'])) { $this->dropzone = $this->input['dropzone']; }
		if (isset($this->input['dir'])) { $this->dir = $this->input['dir']; }
		if (isset($this->input['role'])) { $this->role = $this->input['role']; }
		if (isset($this->input['tabindex'])) { $this->tabindex = (int)$this->input['tabindex']; }
		if (isset($this->input['contenteditable'])) { $this->contenteditable = (bool)$this->input['contenteditable']; }
		if (isset($this->input['draggable'])) { $this->draggable = (bool)$this->input['draggable']; }
		if (isset($this->input['hidden'])) { $this->hidden = (bool)$this->input['hidden']; }
		if (isset($this->input['translate'])) { $this->translate = (bool)$this->input['translate']; }
	}

	private function mapData(array|null $data): void
	{
		foreach ($data as $key => $value)
		{
			$result = new DataDTO();
			$result->name = $key;
			$result->value = (string)$value;
			$this->data[] = $result;
		}
	}

	private function mapAria(array|null $aria): void
	{
		foreach ($aria as $key => $value)
		{
			$result = new AriaDTO();
			$result->name = $key;
			$result->value = (string)$value;
			$this->aria[] = $result;
		}
	}

	private function mapBodyEvents(array|null $bodyEvents): void
	{
		if (!is_null($bodyEvents))
		{
			if (!isset($this->bodyEvents)) { $this->bodyEvents = new JavaScriptBodyEventDTO(); }

			$this->bodyEvents->mapBodyEvents($bodyEvents);

			foreach ($this->bodyEvents as $key => $value) { $this->events[$key] = $value; }
		}
	}

	private function mapEvents(array|null $globalEvents): void
	{
		if (!is_null($globalEvents))
		{
			if (!isset($this->globalEvents)) { $this->globalEvents = new JavaScriptEventDTO(); }

			$this->globalEvents->mapEvents($globalEvents);

			foreach ($this->globalEvents as $key => $value) { $this->events[$key] = $value; }
		}
	}

	private function isBodyClass(): bool
	{
		if (!is_subclass_of($this, Body::class)) { return true; }
		return false;
	}
	#endregion
}
?>