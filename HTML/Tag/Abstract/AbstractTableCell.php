<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Abstract;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

abstract class AbstractTableCell extends Body
{
	#region properties
	protected string|null $headers	/** @property Specifies-one-or-more-cells-a-cell-is-related-to */;
	protected int|null $colspan		/** @property Specifies-the-number-of-columns-a-cell-should-span */;
	protected int|null $rowspan		/** @property Specifies-the-number-of-rows-a-cell-should-span */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		parent::__construct($input, $tagID);
		$this->mapAbstractTableCell();
	}
	#endregion

	#region getter / setter
	public function getHeaders(): string|null { return (isset($this->headers)) ? $this->headers : null; }
	public function setHeaders(string|null $headers): void { $this->headers = $headers; }
	public function getColspan(): int|null { return (isset($this->colspan)) ? $this->colspan : null; }
	public function setColspan(int|null $colspan): void { $this->colspan = $colspan; }
	public function getRowspan(): int|null { return (isset($this->rowspan)) ? $this->rowspan : null; }
	public function setRowspan(int|null $rowspan): void { $this->rowspan = $rowspan; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->headers)) { $result .= ' headers="'.$this->headers.'"'; }
		if (isset($this->colspan)) { $result .= ' colspan="'.$this->colspan.'"'; }
		if (isset($this->rowspan)) { $result .= ' rowspan="'.$this->rowspan.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractTableCell(): void
	{
		if (isset($this->input['headers'])) { $this->headers = $this->input['headers']; }
		if (isset($this->input['colspan'])) { $this->colspan = (int)$this->input['colspan']; }
		if (isset($this->input['rowspan'])) { $this->rowspan = (int)$this->input['rowspan']; }
	}
	#endregion
}
?>