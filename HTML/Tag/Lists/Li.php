<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Lists;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Li extends Body
{
	#region properties
	protected string|null $value	/** @property Specifies-the-start-value-of-the-list-item.-Following-list-items-will-increment-from-that-value */;
	#endregion
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Li; }
		parent::__construct($input, $tagID);
		$this->mapLi();
	}
	#endregion

	#region getter / setter
	public function getValue(): string|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(string|null $value): void { $this->value = $value; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapLi(): void
	{
		if (isset($this->input['value'])) { $this->value = $this->input['value']; }
	}
	#endregion
}
?>