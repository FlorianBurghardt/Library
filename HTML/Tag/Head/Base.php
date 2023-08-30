<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Head;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

final class Base extends Body
{
	#region properties
	protected string|null $href		/** @property Base-URI-or-directory-for-image-and-script-files */;
	protected string|null $target	/** @property Target-for-links-(_blank=>new-window,_self=>same-window,...) */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Base; }
		$this->onlyOpenTag = true;
		parent::__construct($input);
		$this->mapBase();
	}
	#endregion

	#region getter / setter
	public function getHref(): string|null { return (isset($this->href)) ? $this->href : null; }
	public function setHref(string|null $href): void { $this->href = $href; }
	public function getTarget(): string|null { return (isset($this->target)) ? $this->target : null; }
	public function setTarget(string|null $target): void { $this->target = $target; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->href)) { $result .= ' href="'.$this->href.'"'; }
		if (isset($this->target)) { $result .= ' target="'.$this->target.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapBase(): void
	{
		if (isset($this->input['href'])) { $this->href = $this->input['href']; }
		if (isset($this->input['target'])) { $this->target = $this->input['target']; }
	}
	#endregion
}
?>