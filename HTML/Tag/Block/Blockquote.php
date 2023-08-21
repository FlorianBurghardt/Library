<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Block;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Blockquote extends Body
{
	#region properties
	protected string|null $cite	/** @property Source-of-the-quote */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Blockquote'; }
		parent::__construct($input, $tagID);
		$this->mapBlockquote();
	}
	#endregion

	#region getter / setter
	public function getCite(): string|null { return (isset($this->cite)) ? $this->cite : null; }
	public function setCite(string|null $cite): void { $this->cite = $cite; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->cite)) { $result .= ' cite="'.$this->cite.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapBlockquote(): void
	{
		if (isset($this->input['cite'])) { $this->cite = $this->input['cite']; }
	}
	#endregion
}
?>