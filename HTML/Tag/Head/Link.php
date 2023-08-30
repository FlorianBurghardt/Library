<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Head;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

final class Link extends Body
{
	#region properties
	protected string|null $rel				/** @property A-space-separated-list-of-relationship-types */;
	protected string|null $type				/** @property MIME-Typ-of-the-linked-resource */;
	protected string|null $href				/** @property URI-or-file-path-of-the-linked-resource */;
	protected string|null $sizes			/** @property A-space-separated-list-of-sizes-(only-for-rel="icon") */;
	protected string|null $hreflang			/** @property Language-code-of-the-linked-resource */;
	protected string|null $referrerpolicy	/** @property Specifies-which-referrer-policy-is-used.-Example:(no-referrer). */;
	protected string|null $integrity		/** @property Integrity-of-the-linked-resource */;
	protected string|null $crossorigin		/** @property Cross-origin-of-the-linked-resource */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Link; }
		$this->onlyOpenTag = true;
		parent::__construct($input);
		$this->mapLink();
	}
	#endregion

	#region getter / setter
	public function getRel(): string|null { return (isset($this->rel)) ? $this->rel : null; }
	public function setRel(string|null $rel): void { $this->rel = $rel; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	public function getHref(): string|null { return (isset($this->href)) ? $this->href : null; }
	public function setHref(string|null $href): void { $this->href = $href; }
	public function getSizes(): string|null { return (isset($this->sizes)) ? $this->sizes : null; }
	public function setSizes(string|null $sizes): void { $this->sizes = $sizes; }
	public function getHreflang(): string|null { return (isset($this->hreflang)) ? $this->hreflang : null; }
	public function setHreflang(string|null $hreflang): void { $this->hreflang = $hreflang; }
	public function getReferrerpolicy(): string|null { return (isset($this->referrerpolicy)) ? $this->referrerpolicy : null; }
	public function setReferrerpolicy(string|null $referrerpolicy): void { $this->referrerpolicy = $referrerpolicy; }
	public function getIntegrity(): string|null { return (isset($this->integrity)) ? $this->integrity : null; }
	public function setIntegrity(string|null $integrity): void { $this->integrity = $integrity; }
	public function getCrossorigin(): string|null { return (isset($this->crossorigin)) ? $this->crossorigin : null; }
	public function setCrossorigin(string|null $crossorigin): void { $this->crossorigin = $crossorigin; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->rel)) { $result .= ' rel="'.$this->rel.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		if (isset($this->href)) { $result .= ' href="'.$this->href.'"'; }
		if (isset($this->sizes)) { $result .= ' sizes="'.$this->sizes.'"'; }
		if (isset($this->hreflang)) { $result .= ' hreflang="'.$this->hreflang.'"'; }
		if (isset($this->referrerpolicy)) { $result .= ' referrerpolicy="'.$this->referrerpolicy.'"'; }
		if (isset($this->integrity)) { $result .= ' integrity="'.$this->integrity.'"'; }
		if (isset($this->crossorigin)) { $result .= ' crossorigin="'.$this->crossorigin.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapLink(): void
	{
		if (isset($this->input['rel'])) { $this->rel = $this->input['rel']; }
		if (isset($this->input['type'])) { $this->type = $this->input['type']; }
		if (isset($this->input['href'])) { $this->href = $this->input['href']; }
		if (isset($this->input['sizes'])) { $this->sizes = $this->input['sizes']; }
		if (isset($this->input['hreflang'])) { $this->hreflang = $this->input['hreflang']; }
		if (isset($this->input['referrerpolicy'])) { $this->referrerpolicy = $this->input['referrerpolicy']; }
		if (isset($this->input['integrity'])) { $this->integrity = $this->input['integrity']; }
		if (isset($this->input['crossorigin'])) { $this->crossorigin = $this->input['crossorigin']; }
	}
	#endregion
}
?>