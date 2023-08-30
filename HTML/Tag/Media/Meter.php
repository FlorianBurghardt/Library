<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;

#endregion

class Meter extends Progress
{
	#region properties
	protected string|null $form		/** @property Defines-the-form */;
	protected float|null $min		/** @property Defines-the-minimum-value */;
	protected float|null $low		/** @property Defines-small-vlaues-but-not-the-minimum */;
	protected float|null $high		/** @property Defines-high-values-but-not-the-maximum-value */;
	protected float|null $optimum	/** @property Defines-the-optimum-value */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Meter; }
		$this->templateFile = 'double_after.html';
		parent::__construct($input);
		$this->mapMeter();
	}
	#endregion

	#region getter / setter
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getMin(): float|null { return (isset($this->min)) ? $this->min : null; }
	public function setMin(float|null $min): void { $this->min = $min; }
	public function getLow(): float|null { return (isset($this->low)) ? $this->low : null; }
	public function setLow(float|null $low): void { $this->low = $low; }
	public function getHigh(): float|null { return (isset($this->high)) ? $this->high : null; }
	public function setHigh(float|null $high): void { $this->high = $high; }
	public function getOptimum(): float|null { return (isset($this->optimum)) ? $this->optimum : null; }
	public function setOptimum(float|null $optimum): void { $this->optimum = $optimum; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->min)) { $result .= ' min="'.$this->min.'"'; }
		if (isset($this->low)) { $result .= ' low="'.$this->low.'"'; }
		if (isset($this->high)) { $result .= ' high="'.$this->high.'"'; }
		if (isset($this->optimum)) { $result .= ' optimum="'.$this->optimum.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapMeter(): void
	{
		if (isset($this->input['form'])) { $this->form = $this->input['form']; }
		if (isset($this->input['min'])) { $this->min = (float)$this->input['min']; }
		if (isset($this->input['low'])) { $this->low = (float)$this->input['low']; }
		if (isset($this->input['high'])) { $this->high = (float)$this->input['high']; }
		if (isset($this->input['optimum'])) { $this->optimum = (float)$this->input['optimum']; }
	}
	#endregion
}
?>