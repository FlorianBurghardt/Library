<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag;

use de\fburghardt\Library\HTML\Tag\Abstract\AbstractStructure;
#endregion

final class HTML extends AbstractStructure
{
	#region properties
	protected string|null $lang		/** @property Defines-the-language */;
	protected string|null $dir		/** @property Defines-the-reading-direction-(ltr-rtl)-for-whole-page */;
	protected string|null $manifest	/** @property Defines-the-path-of-the-cache-ressource-for-offline-access */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'HTML'; }
		$this->templateFile = 'html.html';
		parent::__construct($input, $tagID);
		$this->mapHTML();
	}
	#endregion

	#region getter / setter
	public function getLang(): string|null { return (isset($this->lang)) ? $this->lang : null; }
	public function setLang(string|null $lang): void { $this->lang = $lang; }
	public function getDir(): string|null { return (isset($this->dir)) ? $this->dir : null; }
	public function setDir(string|null $dir): void { $this->dir = $dir; }
	public function getManifest(): string|null { return (isset($this->manifest)) ? $this->manifest : null; }
	public function setManifest(string|null $manifest): void { $this->manifest = $manifest; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->lang)) { $result .= ' lang="'.$this->lang.'"'; }
		if (isset($this->dir)) { $result .= ' dir="'.$this->dir.'"'; }
		if (isset($this->manifest)) { $result .= ' manifest="'.$this->manifest.'"'; }
		return $result;
	}
	protected function mapHTML(): void
	{
		if (isset($this->input['lang'])) { $this->lang = $this->input['lang']; }
		if (isset($this->input['dir'])) { $this->dir = $this->input['dir']; }
		if (isset($this->input['manifest'])) { $this->manifest = $this->input['manifest']; }
	}
	#endregion
}
?>