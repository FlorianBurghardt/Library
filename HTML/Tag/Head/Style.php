<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Head;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

final class Style extends Body
{
	#region properties
	protected string|null $media	/** @property List-of-media-types-in-which-the-document-can-be-displayed */;
	protected string|null $type		/** @property Document-type-(only-one-value-is-possible-"text/css") */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Style; }
		parent::__construct($input, $tagID);
		$this->mapStyle();
	}
	#endregion

	#region getter / setter
	public function getMedia(): string|null { return (isset($this->media)) ? $this->media : null; }
	public function setMedia(string|null $media): void { $this->media = $media; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->media)) { $result .= ' media="'.$this->media.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapStyle(): void
	{
		if (isset($this->input['media'])) { $this->media = $this->input['media']; }
		if (isset($this->input['type'])) { $this->type = $this->input['type']; }
	}
	#endregion
}
?>