<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Head;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

final class Meta extends Body
{
	#region properties
	protected string|null $name			/** @property Type-of-the-meta-tag */;
	protected string|null $content		/** @property Content-of-the-meta-tag */;
	protected string|null $charset		/** @property Specifies-the-character-encoding-for-the-HTML-document */;
	protected string|null $httpEquiv	/** @property Provides-an-HTTP-header-for-the-information/value-of-the-content-attribute */;
	#endregion

	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Meta'; }
		$this->onlyOpenTag = true;
		parent::__construct($input, $tagID);
		$this->mapMeta();
	}
	#endregion

	#region getter / setter
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getContent(): string|null { return (isset($this->content)) ? $this->content : null; }
	public function setContent(string|null $content): void { $this->content = $content; }
	public function getCharset(): string|null { return (isset($this->charset)) ? $this->charset : null; }
	public function setCharset(string|null $charset): void { $this->charset = $charset; }
	public function getHttpEquiv(): string|null { return (isset($this->httpEquiv)) ? $this->httpEquiv : null; }
	public function setHttpEquiv(string|null $httpEquiv): void { $this->httpEquiv = $httpEquiv; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->content)) { $result .= ' content="'.$this->content.'"'; }
		if (isset($this->charset)) { $result .= ' charset="'.$this->charset.'"'; }
		if (isset($this->httpEquiv)) { $result .= ' http-equiv="'.$this->httpEquiv.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapMeta(): void
	{
		if (isset($this->input['name'])) { $this->name = $this->input['name']; }
		if (isset($this->input['content'])) { $this->content = $this->input['content']; }
		if (isset($this->input['charset'])) { $this->charset = $this->input['charset']; }
		if (isset($this->input['httpEquiv'])) { $this->httpEquiv = $this->input['httpEquiv']; }
	}
	#endregion
}
?>