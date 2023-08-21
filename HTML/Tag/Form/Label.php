<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Form;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Label extends Body
{
	#region properties
	protected string|null $for	/** @property Specifies-the-id-of-the-form-element-the-label-should-be-bound-to */;
	protected string|null $form	/** @property Specifies-which-form-the-label-belongs-to */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Label'; }
		parent::__construct($input, $tagID);
		$this->mapLabel();
	}
	#endregion

	#region getter / setter
	public function getFor(): string|null { return (isset($this->for)) ? $this->for : null; }
	public function setFor(string|null $for): void { $this->for = $for; }
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->for)) { $result .= ' for="'.$this->for.'"'; }
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapLabel(): void
	{
		if (isset($this->input['for'])) { $this->for = $this->input['for']; }
		if (isset($this->input['form'])) { $this->form = $this->input['form']; }
	}
	#endregion
}
?>