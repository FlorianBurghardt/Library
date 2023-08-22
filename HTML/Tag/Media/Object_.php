<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Tag\Abstract\AbstractMedia;
#endregion

class Object_ extends AbstractMedia
{
	#region properties
	protected string|null $objectData		/** @property Specifies-the-URL-of-the-resource-to-be-used-by-the-object */;
	protected string|null $form				/** @property Specifies-which-form-the-object-belongs-to */;
	protected string|null $name				/** @property Specifies-a-name-for-the-object */;
	protected string|null $usemap			/** @property Specifies-the-name-of-a-client-side-image-map-to-be-used-with-the-object */;
	protected string|null $type				/** @property Specifies-the-media-type-of-data-specified-in-the-data-attribute */;
	protected bool $typemustmatch = false	/** @property Specifies-whether-the-type-attribute-and-the-actual-content-of-the-resource-must-match-to-be-displayed */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Object'; }
		parent::__construct($input, $tagID);
		$this->mapObject();
	}
	#endregion

	#region getter / setter
	public function getObjectData(): string|null { return (isset($this->objectData)) ? $this->objectData : null; }
	public function setObjectData(string|null $objectData): void { $this->objectData = $objectData; }
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getUsemap(): string|null { return (isset($this->usemap)) ? $this->usemap : null; }
	public function setUsemap(string|null $usemap): void { $this->usemap = $usemap; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	public function getTypemustmatch(): bool { return $this->typemustmatch; }
	public function setTypemustmatch(bool $typemustmatch): void { $this->typemustmatch = $typemustmatch; }

	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->objectData)) { $result .= ' objectData="'.$this->objectData.'"'; }
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->usemap)) { $result .= ' usemap="'.$this->usemap.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		if ($this->typemustmatch === true) { $result .= ' typemustmatch'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapObject(): void
	{
		if (isset($this->input['objectData'])) { $this->objectData = $this->input['objectData']; }
		if (isset($this->input['form'])) { $this->form = $this->input['form']; }
		if (isset($this->input['name'])) { $this->name = $this->input['name']; }
		if (isset($this->input['usemap'])) { $this->usemap = $this->input['usemap']; }
		if (isset($this->input['type'])) { $this->type = $this->input['type']; }
		if (isset($this->input['typemustmatch'])) { $this->typemustmatch = (bool)$this->input['typemustmatch']; }
	}
	#endregion
}
?>