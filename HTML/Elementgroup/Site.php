<?php
#region usings
namespace de\fburghardt\Library\HTML\Elementgroup;

use de\fburghardt\Library\HTML\Tag\Body;
use de\fburghardt\Library\HTML\Tag\Head;
use de\fburghardt\Library\HTML\Tag\HTML;

#endregion

class Site
{
	#region properties
	protected HTML $html;
    protected Head $head;
	protected Body $body;
	#endregion
	
	#region constructor
	public function __construct($headTagID = 'head', $bodyTagID = 'body')
	{
        $this->html = new HTML(['tagID' => 'html']);
        $this->head = new Head(['tagID' => $headTagID]);
        $this->body = new Body(['tagID' => $bodyTagID]);
        $this->html->add($this->head);
        $this->html->add($this->body);
	}
	public function __destruct() { $this->html->display(); }
	#endregion

	#region getters
	public function getHtml(): HTML { return $this->html; }
	public function getHead(): Head { return $this->head; }
	public function getBody(): Body { return $this->body; }
	#endregion
}
?>