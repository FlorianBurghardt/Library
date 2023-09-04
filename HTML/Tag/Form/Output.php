<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Form;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Output extends Body
{
	#region properties
	protected string|null $for	/** @property Specifies-the-relationship-between-the-result-of-the-calculation,-and-the-elements-used-in-the-calculation */;
	protected string|null $form	/** @property Specifies-which-form-the-output-element-belongs-to */;
	protected string|null $name	/** @property Specifies-a-name-for-the-output-element */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Output; }
		parent::__construct($input);
		$this->mapOutput();
	}
	#endregion

	#region getter / setter
	public function getFor(): string|null { return (isset($this->for)) ? $this->for : null; }
	public function setFor(string|null $for): void { $this->for = $for; }
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->for)) { $result .= ' for="'.$this->for.'"'; }
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapOutput(): void
	{
		if (isset($this->input['for'])) { $this->for = $this->input['for']; }
		if (isset($this->input['form'])) { $this->form = $this->input['form']; }
		if (isset($this->input['name'])) { $this->name = $this->input['name']; }
	}
	#endregion
}
?>