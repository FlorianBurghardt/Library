<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Progress extends Body
{
	#region properties
	protected float|null $max		/** @property Defines-the-maximum-value */;
	protected float|null $value		/** @property Defines-the-current-value */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Progress'; }
		$this->templateFile = 'double_after.html';
		parent::__construct($input, $tagID);
		$this->mapProgress();
	}
	#endregion

	#region getter / setter
	public function getMax(): float|null { return (isset($this->max)) ? $this->max : null; }
	public function setMax(float|null $max): void { $this->max = $max; }
	public function getValue(): float|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(float|null $value): void { $this->value = $value; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->max)) { $result .= ' max="'.$this->max.'"'; }
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapProgress(): void
	{
		if (isset($this->input['max'])) { $this->max = (float)$this->input['max']; }
		if (isset($this->input['value'])) { $this->value = (float)$this->input['value']; }
	}
	#endregion
}
?>