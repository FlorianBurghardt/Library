<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Table;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractTableCell;
#endregion

class Th extends AbstractTableCell
{
	#region properties
	protected string|null $abbr		/** @property Specifies-an-abbreviated-version-of-the-content-in-a-cell */;
	protected string|null $scope	/** @property Specifies-a-header-cell-is-a-header-for-a-column,-row,-or-group */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Th; }
		parent::__construct($input, $tagID);
		$this->mapTh();
	}
	#endregion

	#region getter / setter
	public function getAbbr(): string|null { return (isset($this->abbr)) ? $this->abbr : null; }
	public function setAbbr(string|null $abbr): void { $this->abbr = $abbr; }
	public function getScope(): string|null { return (isset($this->scope)) ? $this->scope : null; }
	public function setScope(string|null $scope): void { $this->scope = $scope; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->abbr)) { $result .= ' abbr="'.$this->abbr.'"'; }
		if (isset($this->scope)) { $result .= ' scope="'.$this->scope.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapTh(): void
	{
		if (isset($this->input['abbr'])) { $this->abbr = $this->input['abbr']; }
		if (isset($this->input['scope'])) { $this->scope = $this->input['scope']; }
	}
	#endregion
}
?>