<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Form;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Option extends Body
{
	#region properties
	protected string|null $label		/** @property Specifies-a-shorter-label-for-an-option */;
	protected string|null $value		/** @property Specifies-the-value-to-be-sent-to-a-server */;
	protected bool $disabled = false	/** @property Specifies-that-an-option-should-be-disabled */;
	protected bool $selected = false	/** @property Specifies-that-an-option-should-be-pre-selected-when-the-page-loads */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Option'; }
		parent::__construct($input, $tagID);
		$this->mapOption();
	}
	#endregion

	#region getter / setter
	public function getLabel(): string|null { return (isset($this->label)) ? $this->label : null; }
	public function setLabel(string|null $label): void { $this->label = $label; }
	public function getValue(): string|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(string|null $value): void { $this->value = $value; }
	public function getDisabled(): bool { return $this->disabled; }
	public function setDisabled(bool $disabled): void { $this->disabled = $disabled; }
	public function getSelected(): bool { return $this->selected; }
	public function setSelected(bool $selected): void { $this->selected = $selected; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->label)) { $result .= ' label="'.$this->label.'"'; }
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		if ($this->disabled === true) { $result .= ' disabled'; }
		if ($this->selected === true) { $result .= ' selected'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapOption(): void
	{
		if (isset($this->input['label'])) { $this->label = $this->input['label']; }
		if (isset($this->input['value'])) { $this->value = $this->input['value']; }
		if (isset($this->input['disabled'])) { $this->disabled = (bool)$this->input['disabled']; }
		if (isset($this->input['selected'])) { $this->selected = (bool)$this->input['selected']; }
	}
	#endregion
}
?>