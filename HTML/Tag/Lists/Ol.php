<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Lists;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractList;
#endregion

class Ol extends AbstractList
{
	#region properties
	protected string|null $start		/** @property Specifies-the-start-value-of-an-ordered-list */;
	protected bool $reversed = false	/** @property Specifies-that-the-list-order-should-be-reversed-(9,8,7...) */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Ol; }
		parent::__construct($input, $tagID);
		$this->mapOl();
	}
	#endregion

	#region getter / setter
	public function getStart(): string|null { return (isset($this->start)) ? $this->start : null; }
	public function setStart(string|null $start): void { $this->start = $start; }
	public function getReversed(): bool { return $this->reversed; }
	public function setReversed(bool $reversed): void { $this->reversed = $reversed; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->start)) { $result .= ' start="'.$this->start.'"'; }
		if ($this->reversed === true) { $result .= ' reversed'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapOl(): void
	{
		if (isset($this->input['start'])) { $this->start = $this->input['start']; }
		if (isset($this->input['reversed'])) { $this->reversed = (bool)$this->input['reversed']; }
	}
	#endregion
}
?>