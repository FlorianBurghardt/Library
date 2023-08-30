<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Form;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Select extends Body
{
	#region properties
	protected string|null $form			/** @property Defines-which-form-the-drop-down-list-belongs-to */;
	protected string|null $name			/** @property Defines-a-name-for-the-drop-down-list */;
	protected int|null $size			/** @property Defines-the-number-of-visible-options-in-a-drop-down-list */;
	protected bool $autofocus = false	/** @property Specifies-that-the-drop-down-list-should-automatically-get-focus-when-the-page-loads */;
	protected bool $disabled = false	/** @property Specifies-that-a-drop-down-list-should-be-disabled */;
	protected bool $multiple = false	/** @property Specifies-that-multiple-options-can-be-selected-at-once */;
	protected bool $required = false	/** @property Specifies-that-the-user-is-required-to-select-a-value-before-submitting-the-form */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Select; }
		parent::__construct($input);
		$this->mapSelect();
	}
	#endregion

	#region getter / setter
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getSize(): int|null { return (isset($this->size)) ? $this->size : null; }
	public function setSize(int|null $size): void { $this->size = $size; }
	public function getAutofocus(): bool { return $this->autofocus; }
	public function setAutofocus(bool $autofocus): void { $this->autofocus = $autofocus; }
	public function getDisabled(): bool { return $this->disabled; }
	public function setDisabled(bool $disabled): void { $this->disabled = $disabled; }
	public function getMultiple(): bool { return $this->multiple; }
	public function setMultiple(bool $multiple): void { $this->multiple = $multiple; }
	public function getRequired(): bool { return $this->required; }
	public function setRequired(bool $required): void { $this->required = $required; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->size)) { $result .= ' size="'.$this->size.'"'; }
		if ($this->autofocus === true) { $result .= ' autofocus'; }
		if ($this->disabled === true) { $result .= ' disabled'; }
		if ($this->multiple === true) { $result .= ' multiple'; }
		if ($this->required === true) { $result .= ' required'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapSelect(): void
	{
		if (isset($this->input['form'])) { $this->form = $this->input['form']; }
		if (isset($this->input['name'])) { $this->name = $this->input['name']; }
		if (isset($this->input['size'])) { $this->size = (int)$this->input['size']; }
		if (isset($this->input['autofocus'])) { $this->autofocus = (bool)$this->input['autofocus']; }
		if (isset($this->input['disabled'])) { $this->disabled = (bool)$this->input['disabled']; }
		if (isset($this->input['multiple'])) { $this->multiple = (bool)$this->input['multiple']; }
		if (isset($this->input['required'])) { $this->required = (bool)$this->input['required']; }
	}
	#endregion
}
?>