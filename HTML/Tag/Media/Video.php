<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractPlayable;
#endregion

class Video extends AbstractPlayable
{
	#region properties
	protected string|null $poster	/** @property Specifies-an-image-to-be-shown-while-video-is-downloading */;
	protected int|null $width		/** @property Width-of-the-image */;
	protected int|null $height		/** @property Height-of-the-image */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Video; }
		parent::__construct($input);
		$this->mapVideo();
	}
	#endregion

	#region getter / setter
	public function getPoster(): string|null { return (isset($this->poster)) ? $this->poster : null; }
	public function setPoster(string|null $poster): void { $this->poster = $poster; }
	public function getWidth(): int|null { return (isset($this->width)) ? $this->width : null; }
	public function setWidth(int|null $width): void { $this->width = $width; }
	public function getHeight(): int|null { return (isset($this->height)) ? $this->height : null; }
	public function setHeight(int|null $height): void { $this->height = $height; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->poster)) { $result .= ' poster="'.$this->poster.'"'; }
		if (isset($this->width)) { $result .= ' width="'.$this->width.'"'; }
		if (isset($this->height)) { $result .= ' height="'.$this->height.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapVideo(): void
	{
		if (isset($this->input['poster'])) { $this->poster = $this->input['poster']; }
		if (isset($this->input['width'])) { $this->width = (int)$this->input['width']; }
		if (isset($this->input['height'])) { $this->height = (int)$this->input['height']; }
	}
	#endregion
}
?>