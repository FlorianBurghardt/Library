<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Abstract;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

abstract class AbstractList extends Body
{
	#region properties
	protected string|null $type	/** @property List-item-marker-type-of-the-inner-(li)-elements */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		parent::__construct($input, $tagID);
		$this->mapAbstractList();
	}
	#endregion

	#region getter / setter
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractList(): void
	{
		if (isset($this->input['type'])) { $this->type = $this->input['type']; }
	}
	#endregion
}
?>