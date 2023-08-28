<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Track extends Body
{
	#region properties
	protected string|null $default	/** @property Specifies-that-the-track-is-to-be-enabled-if-the-user's-preferences-do-not-indicate-that-another-track-would-be-more-appropriate */;
	protected string|null $kind		/** @property Specifies-the-kind-of-text-track */;
	protected string|null $label	/** @property Specifies-the-title-of-the-text-track */;
	protected string|null $src		/** @property Specifies-the-URL-of-the-track-file */;
	protected string|null $srclang	/** @property Specifies-the-language-of-the-track-text-data-(required-if-kind="subtitles") */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Track; }
		parent::__construct($input, $tagID);
		$this->mapTrack();
	}
	#endregion

	#region getter / setter
	public function getDefault(): string|null { return (isset($this->default)) ? $this->default : null; }
	public function setDefault(string|null $default): void { $this->default = $default; }
	public function getKind(): string|null { return (isset($this->kind)) ? $this->kind : null; }
	public function setKind(string|null $kind): void { $this->kind = $kind; }
	public function getLabel(): string|null { return (isset($this->label)) ? $this->label : null; }
	public function setLabel(string|null $label): void { $this->label = $label; }
	public function getSrc(): string|null { return (isset($this->src)) ? $this->src : null; }
	public function setSrc(string|null $src): void { $this->src = $src; }
	public function getSrclang(): string|null { return (isset($this->srclang)) ? $this->srclang : null; }
	public function setSrclang(string|null $srclang): void { $this->srclang = $srclang; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->default)) { $result .= ' default="'.$this->default.'"'; }
		if (isset($this->kind)) { $result .= ' kind="'.$this->kind.'"'; }
		if (isset($this->label)) { $result .= ' label="'.$this->label.'"'; }
		if (isset($this->src)) { $result .= ' src="'.$this->src.'"'; }
		if (isset($this->srclang)) { $result .= ' srclang="'.$this->srclang.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapTrack(): void
	{
		if (isset($this->input['default'])) { $this->default = $this->input['default']; }
		if (isset($this->input['kind'])) { $this->kind = $this->input['kind']; }
		if (isset($this->input['label'])) { $this->label = $this->input['label']; }
		if (isset($this->input['src'])) { $this->src = $this->input['src']; }
		if (isset($this->input['srclang'])) { $this->srclang = $this->input['srclang']; }
	}
	#endregion
}
?>