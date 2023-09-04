<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractLink;
#endregion

class A extends AbstractLink
{
	#region properties
	protected string|null $ping			/** @property List-of-URLs-to-switch */;
	protected bool $download = false	/** @property Download-link-source-on-click-when-value-is-(true) */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::A; }
		parent::__construct($input);
		$this->mapA();
	}
	#endregion

	#region getter / setter
	public function getPing(): string|null { return (isset($this->ping)) ? $this->ping : null; }
	public function setPing(string|null $ping): void { $this->ping = $ping; }
	public function getDownload(): bool { return $this->download; }
	public function setDownload(bool $download): void { $this->download = $download; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->ping)) { $result .= ' ping="'.$this->ping.'"'; }
		if ($this->download === true) { $result .= ' download'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapA(): void
	{
		if (isset($this->input['ping'])) { $this->ping = $this->input['ping']; }
		if (isset($this->input['download'])) { $this->download = (bool)$this->input['download']; }
	}
	#endregion
}
?>