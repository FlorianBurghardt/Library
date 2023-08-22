<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Map extends Body
{
	#region properties
	protected string|null $name	/** @property Specifies-the-name-of-the-image-map */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Map'; }
		parent::__construct($input, $tagID);
		$this->mapMap();
	}
	#endregion

	#region getter / setter
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapMap(): void
	{
		if (isset($this->input['name'])) { $this->name = $this->input['name']; }
	}
	#endregion
}
?>