<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Abstract;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

abstract class AbstractTableCol extends Body
{
	#region properties
	protected int|null $span	/** @property Specifies-the-number-of-columns-a-col-should-span */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		parent::__construct($input, $tagID);
		$this->mapAbstractTableCol();
	}
	#endregion

	#region getter / setter
	public function getSpan(): int|null { return (isset($this->span)) ? $this->span : null; }
	public function setSpan(int|null $span): void { $this->span = $span; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->span)) { $result .= ' span="'.$this->span.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractTableCol(): void
	{
		if (isset($this->input['span'])) { $this->span = (int)$this->input['span']; }
	}
	#endregion
}
?>