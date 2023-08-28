<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Block;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Details extends Body
{
	#region properties
	protected bool $open = false	/** @property Deatils-area-is-open-when-value-is-(true) */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Details; }
		parent::__construct($input, $tagID);
		$this->mapDetails();
	}
	#endregion

	#region getter / setter
	public function getOpen(): bool { return $this->open; }
	public function setOpen(bool $open): void { $this->open = $open; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if ($this->open === true) { $result .= ' open'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapDetails(): void
	{
		if (isset($this->input['open'])) { $this->open = (bool)$this->input['open']; }
	}
	#endregion
}
?>