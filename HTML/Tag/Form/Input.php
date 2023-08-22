<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Form;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Input extends Body
{
	#region properties
	protected string|null $accept			/** @property Specifies-a-filter-for-what-file-types-the-user-can-pick-from-the-file-input-dialog-box-(only-for-type="file") */;
	protected string|null $alt				/** @property Specifies-an-alternate-text-for-images-(only-for-type="image") */;
	protected string|null $autocomplete		/** @property Specifies-whether-an-<input>-element-should-have-autocomplete-enabled */;
	protected string|null $dirname			/** @property Specifies-that-the-text-direction-will-be-submitted */;
	protected string|null $form				/** @property Specifies-the-form-the-<input>-element-belongs-to */;
	protected string|null $formaction		/** @property Specifies-the-URL-of-the-file-that-will-process-the-input-control-when-the-form-is-submitted-(for-type="submit"-and-type="image") */;
	protected string|null $formenctype		/** @property Specifies-how-the-form-data-should-be-encoded-when-submitting-it-to-the-server-(for-type="submit"-and-type="image") */;
	protected string|null $formmethod		/** @property Defines-the-HTTP-method-for-sending-data-to-the-action-URL-(for-type="submit"-and-type="image") */;
	protected string|null $formtarget		/** @property Specifies-where-to-display-the-response-that-is-received-after-submitting-the-form-(for-type="submit"-and-type="image") */;
	protected string|null $list				/** @property Refers-to-a-<datalist>-element-that-contains-pre-defined-options-for-an-<input>-element */;
	protected string|null $max				/** @property Specifies-the-maximum-value-for-an-<input>-element */;
	protected string|null $min				/** @property Specifies-a-minimum-value-for-an-<input>-element */;
	protected string|null $name				/** @property Specifies-the-name-of-an-<input>-element */;
	protected string|null $pattern			/** @property Specifies-a-regular-expression-that-an-<input>-element's-value-is-checked-against */;
	protected string|null $placeholder		/** @property Specifies-a-short-hint-that-describes-the-expected-value-of-an-<input>-element */;
	protected string|null $src				/** @property Specifies-the-URL-of-the-image-to-use-as-a-submit-button-(only-for-type="image") */;
	protected string|null $step				/** @property Specifies-the-interval-between-legal-numbers-in-an-input-field */;
	protected string|null $type				/** @property Specifies-the-type-<input>-element-to-display */;
	protected string|null $value			/** @property Specifies-the-value-of-an-<input>-element */;
	protected int|null $height				/** @property Specifies-the-height-of-an-<input>-element-(only-for-type="image") */;
	protected int|null $maxlength			/** @property Specifies-the-maximum-number-of-characters-allowed-in-an-<input>-element */;
	protected int|null $minlength			/** @property Specifies-the-minimum-number-of-characters-required-in-an-<input>-element */;
	protected int|null $size				/** @property Specifies-the-width,-in-characters,-of-an-<input>-element */;
	protected int|null $width				/** @property Specifies-the-width-of-an-<input>-element-(only-for-type="image") */;
	protected bool $autofocus = false		/** @property Specifies-that-an-<input>-element-should-automatically-get-focus-when-the-page-loads */;
	protected bool $checked = false			/** @property Specifies-that-an-<input>-element-should-be-pre-selected-when-the-page-loads-(for-type="checkbox"-or-type="radio") */;
	protected bool $disabled = false		/** @property Specifies-that-an-<input>-element-should-be-disabled */;
	protected bool $formnovalidate = false	/** @property Defines-that-form-elements-should-not-be-validated-when-submitted */;
	protected bool $multiple = false		/** @property Specifies-that-a-user-can-enter-more-than-one-value-in-an-<input>-element */;
	protected bool $readonly = false		/** @property Specifies-that-an-input-field-is-read-only */;
	protected bool $required = false		/** @property Specifies-that-an-input-field-must-be-filled-out-before-submitting-the-form */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Input'; }
		parent::__construct($input, $tagID);
		$this->mapInput();
	}
	#endregion

	#region getter / setter
	public function getAccept(): string|null { return (isset($this->accept)) ? $this->accept : null; }
	public function setAccept(string|null $accept): void { $this->accept = $accept; }
	public function getAlt(): string|null { return (isset($this->alt)) ? $this->alt : null; }
	public function setAlt(string|null $alt): void { $this->alt = $alt; }
	public function getAutocomplete(): string|null { return (isset($this->autocomplete)) ? $this->autocomplete : null; }
	public function setAutocomplete(string|null $autocomplete): void { $this->autocomplete = $autocomplete; }
	public function getDirname(): string|null { return (isset($this->dirname)) ? $this->dirname : null; }
	public function setDirname(string|null $dirname): void { $this->dirname = $dirname; }
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getFormaction(): string|null { return (isset($this->formaction)) ? $this->formaction : null; }
	public function setFormaction(string|null $formaction): void { $this->formaction = $formaction; }
	public function getFormenctype(): string|null { return (isset($this->formenctype)) ? $this->formenctype : null; }
	public function setFormenctype(string|null $formenctype): void { $this->formenctype = $formenctype; }
	public function getFormmethod(): string|null { return (isset($this->formmethod)) ? $this->formmethod : null; }
	public function setFormmethod(string|null $formmethod): void { $this->formmethod = $formmethod; }
	public function getFormtarget(): string|null { return (isset($this->formtarget)) ? $this->formtarget : null; }
	public function setFormtarget(string|null $formtarget): void { $this->formtarget = $formtarget; }
	public function getList(): string|null { return (isset($this->list)) ? $this->list : null; }
	public function setList(string|null $list): void { $this->list = $list; }
	public function getMax(): string|null { return (isset($this->max)) ? $this->max : null; }
	public function setMax(string|null $max): void { $this->max = $max; }
	public function getMin(): string|null { return (isset($this->min)) ? $this->min : null; }
	public function setMin(string|null $min): void { $this->min = $min; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getPattern(): string|null { return (isset($this->pattern)) ? $this->pattern : null; }
	public function setPattern(string|null $pattern): void { $this->pattern = $pattern; }
	public function getPlaceholder(): string|null { return (isset($this->placeholder)) ? $this->placeholder : null; }
	public function setPlaceholder(string|null $placeholder): void { $this->placeholder = $placeholder; }
	public function getSrc(): string|null { return (isset($this->src)) ? $this->src : null; }
	public function setSrc(string|null $src): void { $this->src = $src; }
	public function getStep(): string|null { return (isset($this->step)) ? $this->step : null; }
	public function setStep(string|null $step): void { $this->step = $step; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	public function getValue(): string|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(string|null $value): void { $this->value = $value; }
	public function getHeight(): int|null { return (isset($this->height)) ? $this->height : null; }
	public function setHeight(int|null $height): void { $this->height = $height; }
	public function getMaxlength(): int|null { return (isset($this->maxlength)) ? $this->maxlength : null; }
	public function setMaxlength(int|null $maxlength): void { $this->maxlength = $maxlength; }
	public function getMinlength(): int|null { return (isset($this->minlength)) ? $this->minlength : null; }
	public function setMinlength(int|null $minlength): void { $this->minlength = $minlength; }
	public function getSize(): int|null { return (isset($this->size)) ? $this->size : null; }
	public function setSize(int|null $size): void { $this->size = $size; }
	public function getWidth(): int|null { return (isset($this->width)) ? $this->width : null; }
	public function setWidth(int|null $width): void { $this->width = $width; }
	public function getAutofocus(): bool { return $this->autofocus; }
	public function setAutofocus(bool $autofocus): void { $this->autofocus = $autofocus; }
	public function getChecked(): bool { return $this->checked; }
	public function setChecked(bool $checked): void { $this->checked = $checked; }
	public function getDisabled(): bool { return $this->disabled; }
	public function setDisabled(bool $disabled): void { $this->disabled = $disabled; }
	public function getFormnovalidate(): bool { return $this->formnovalidate; }
	public function setFormnovalidate(bool $formnovalidate): void { $this->formnovalidate = $formnovalidate; }
	public function getMultiple(): bool { return $this->multiple; }
	public function setMultiple(bool $multiple): void { $this->multiple = $multiple; }
	public function getReadonly(): bool { return $this->readonly; }
	public function setReadonly(bool $readonly): void { $this->readonly = $readonly; }
	public function getRequired(): bool { return $this->required; }
	public function setRequired(bool $required): void { $this->required = $required; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->accept)) { $result .= ' accept="'.$this->accept.'"'; }
		if (isset($this->alt)) { $result .= ' alt="'.$this->alt.'"'; }
		if (isset($this->autocomplete)) { $result .= ' autocomplete="'.$this->autocomplete.'"'; }
		if (isset($this->dirname)) { $result .= ' dirname="'.$this->dirname.'"'; }
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->formaction)) { $result .= ' formaction="'.$this->formaction.'"'; }
		if (isset($this->formenctype)) { $result .= ' formenctype="'.$this->formenctype.'"'; }
		if (isset($this->formmethod)) { $result .= ' formmethod="'.$this->formmethod.'"'; }
		if (isset($this->formtarget)) { $result .= ' formtarget="'.$this->formtarget.'"'; }
		if (isset($this->list)) { $result .= ' list="'.$this->list.'"'; }
		if (isset($this->max)) { $result .= ' max="'.$this->max.'"'; }
		if (isset($this->min)) { $result .= ' min="'.$this->min.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->pattern)) { $result .= ' pattern="'.$this->pattern.'"'; }
		if (isset($this->placeholder)) { $result .= ' placeholder="'.$this->placeholder.'"'; }
		if (isset($this->src)) { $result .= ' src="'.$this->src.'"'; }
		if (isset($this->step)) { $result .= ' step="'.$this->step.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		if (isset($this->height)) { $result .= ' height="'.$this->height.'"'; }
		if (isset($this->maxlength)) { $result .= ' maxlength="'.$this->maxlength.'"'; }
		if (isset($this->minlength)) { $result .= ' minlength="'.$this->minlength.'"'; }
		if (isset($this->size)) { $result .= ' size="'.$this->size.'"'; }
		if (isset($this->width)) { $result .= ' width="'.$this->width.'"'; }
		if ($this->autofocus === true) { $result .= ' autofocus'; }
		if ($this->checked === true) { $result .= ' checked'; }
		if ($this->disabled === true) { $result .= ' disabled'; }
		if ($this->formnovalidate === true) { $result .= ' formnovalidate'; }
		if ($this->multiple === true) { $result .= ' multiple'; }
		if ($this->readonly === true) { $result .= ' readonly'; }
		if ($this->required === true) { $result .= ' required'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapInput(): void
	{
		if (isset($this->input['accept'])) { $this->accept = $this->input['accept']; }
		if (isset($this->input['alt'])) { $this->alt = $this->input['alt']; }
		if (isset($this->input['autocomplete'])) { $this->autocomplete = $this->input['autocomplete']; }
		if (isset($this->input['dirname'])) { $this->dirname = $this->input['dirname']; }
		if (isset($this->input['form'])) { $this->form = $this->input['form']; }
		if (isset($this->input['formaction'])) { $this->formaction = $this->input['formaction']; }
		if (isset($this->input['formenctype'])) { $this->formenctype = $this->input['formenctype']; }
		if (isset($this->input['formmethod'])) { $this->formmethod = $this->input['formmethod']; }
		if (isset($this->input['formtarget'])) { $this->formtarget = $this->input['formtarget']; }
		if (isset($this->input['list'])) { $this->list = $this->input['list']; }
		if (isset($this->input['max'])) { $this->max = $this->input['max']; }
		if (isset($this->input['min'])) { $this->min = $this->input['min']; }
		if (isset($this->input['name'])) { $this->name = $this->input['name']; }
		if (isset($this->input['pattern'])) { $this->pattern = $this->input['pattern']; }
		if (isset($this->input['placeholder'])) { $this->placeholder = $this->input['placeholder']; }
		if (isset($this->input['src'])) { $this->src = $this->input['src']; }
		if (isset($this->input['step'])) { $this->step = $this->input['step']; }
		if (isset($this->input['type'])) { $this->type = $this->input['type']; }
		if (isset($this->input['value'])) { $this->value = $this->input['value']; }
		if (isset($this->input['height'])) { $this->height = (int)$this->input['height']; }
		if (isset($this->input['maxlength'])) { $this->maxlength = (int)$this->input['maxlength']; }
		if (isset($this->input['minlength'])) { $this->minlength = (int)$this->input['minlength']; }
		if (isset($this->input['size'])) { $this->size = (int)$this->input['size']; }
		if (isset($this->input['width'])) { $this->width = (int)$this->input['width']; }
		if (isset($this->input['autofocus'])) { $this->autofocus = (bool)$this->input['autofocus']; }
		if (isset($this->input['checked'])) { $this->checked = (bool)$this->input['checked']; }
		if (isset($this->input['disabled'])) { $this->disabled = (bool)$this->input['disabled']; }
		if (isset($this->input['formnovalidate'])) { $this->formnovalidate = (bool)$this->input['formnovalidate']; }
		if (isset($this->input['multiple'])) { $this->multiple = (bool)$this->input['multiple']; }
		if (isset($this->input['readonly'])) { $this->readonly = (bool)$this->input['readonly']; }
		if (isset($this->input['required'])) { $this->required = (bool)$this->input['required']; }
	}
	#endregion
}
?>