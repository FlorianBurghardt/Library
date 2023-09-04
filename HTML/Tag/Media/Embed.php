<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractMedia;
#endregion

class Embed extends AbstractMedia
{
	#region properties
	protected string|null $type	/** @property Specifies-the-media-type-of-the-embedded-content */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Embed; }
		parent::__construct($input);
		$this->mapEmbed();
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
	protected function mapEmbed(): void
	{
		if (isset($this->input['type'])) { $this->type = $this->input['type']; }
	}
	#endregion
}
?>