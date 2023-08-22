<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Inline;

use de\fburghardt\Library\HTML\Tag\Block\Blockquote;
#endregion

class Del extends Blockquote
{
	#region properties
	protected string|null $datetime	/** @property A-machine-readable-value-of-the-datetime */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Del'; }
		parent::__construct($input, $tagID);
		$this->mapDel();
	}
	#endregion

	#region getter / setter
	public function getDatetime(): string|null { return (isset($this->datetime)) ? $this->datetime : null; }
	public function setDatetime(string|null $datetime): void { $this->datetime = $datetime; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->datetime)) { $result .= ' datetime="'.$this->datetime.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapDel(): void
	{
		if (isset($this->input['datetime'])) { $this->datetime = $this->input['datetime']; }
	}
	#endregion
}
?>