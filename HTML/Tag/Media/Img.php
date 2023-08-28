<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractMedia;
#endregion

class Img extends AbstractMedia
{
	#region properties
	protected string|null $srcset			/** @property Set_of-base-URI-or-directory-for-image-and-script-files-with-different-sizes */;
	protected string|null $sizes			/** @property Set_of-sizes-use-together-with-srcset */;
	protected string|null $alt				/** @property Alternative-image-description */;
	protected string|null $loading			/** @property Instruction-browser-when-to-load-image-(Possible values:lazy|eager|auto) */;
	protected string|null $crossorigin		/** @property Controls-access-to-image-from-external-scripts-(e.g.-AJAX) */;
	protected string|null $usemap			/** @property Name-of-an-image-map-to-be-associated-with-the-element */;
	protected string|null $longdesc			/** @property Specifies-a-URL-to-a-detailed-description-of-an-image */;
	protected bool $ismap = false			/** @property Indicates-that-image-is-a-clickable-server-side-image-map */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Img; }
		parent::__construct($input, $tagID);
		$this->mapImg();
	}
	#endregion

	#region getter / setter
	public function getSrcset(): string|null { return (isset($this->srcset)) ? $this->srcset : null; }
	public function setSrcset(string|null $srcset): void { $this->srcset = $srcset; }
	public function getSizes(): string|null { return (isset($this->sizes)) ? $this->sizes : null; }
	public function setSizes(string|null $sizes): void { $this->sizes = $sizes; }
	public function getAlt(): string|null { return (isset($this->alt)) ? $this->alt : null; }
	public function setAlt(string|null $alt): void { $this->alt = $alt; }
	public function getLoading(): string|null { return (isset($this->loading)) ? $this->loading : null; }
	public function setLoading(string|null $loading): void { $this->loading = $loading; }
	public function getCrossorigin(): string|null { return (isset($this->crossorigin)) ? $this->crossorigin : null; }
	public function setCrossorigin(string|null $crossorigin): void { $this->crossorigin = $crossorigin; }
	public function getUsemap(): string|null { return (isset($this->usemap)) ? $this->usemap : null; }
	public function setUsemap(string|null $usemap): void { $this->usemap = $usemap; }
	public function getLongdesc(): string|null { return (isset($this->longdesc)) ? $this->longdesc : null; }
	public function setLongdesc(string|null $longdesc): void { $this->longdesc = $longdesc; }
	public function getIsmap(): bool { return $this->ismap; }
	public function setIsmap(bool $ismap): void { $this->ismap = $ismap; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->srcset)) { $result .= ' srcset="'.$this->srcset.'"'; }
		if (isset($this->sizes)) { $result .= ' sizes="'.$this->sizes.'"'; }
		if (isset($this->alt)) { $result .= ' alt="'.$this->alt.'"'; }
		if (isset($this->loading)) { $result .= ' loading="'.$this->loading.'"'; }
		if (isset($this->crossorigin)) { $result .= ' crossorigin="'.$this->crossorigin.'"'; }
		if (isset($this->usemap)) { $result .= ' usemap="'.$this->usemap.'"'; }
		if (isset($this->longdesc)) { $result .= ' longdesc="'.$this->longdesc.'"'; }
		if ($this->ismap === true) { $result .= ' ismap'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapImg(): void
	{
		if (isset($this->input['srcset'])) { $this->srcset = $this->input['srcset']; }
		if (isset($this->input['sizes'])) { $this->sizes = $this->input['sizes']; }
		if (isset($this->input['alt'])) { $this->alt = $this->input['alt']; }
		if (isset($this->input['loading'])) { $this->loading = $this->input['loading']; }
		if (isset($this->input['crossorigin'])) { $this->crossorigin = $this->input['crossorigin']; }
		if (isset($this->input['usemap'])) { $this->usemap = $this->input['usemap']; }
		if (isset($this->input['longdesc'])) { $this->longdesc = $this->input['longdesc']; }
		if (isset($this->input['ismap'])) { $this->ismap = (bool)$this->input['ismap']; }
	}
	#endregion
}
?>