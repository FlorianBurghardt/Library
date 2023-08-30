<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Dialog extends Body
{
	#region properties
	protected bool $open = false	/** @property Specifies-that-the-dialog-element-is-active-and-that-the-user-can-interact-with-it-when-value-is-(true) */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Dialog; }
		parent::__construct($input);
		$this->mapDialog();
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
	protected function mapDialog(): void
	{
		if (isset($this->input['open'])) { $this->open = (bool)$this->input['open']; }
	}
	#endregion
}
?>