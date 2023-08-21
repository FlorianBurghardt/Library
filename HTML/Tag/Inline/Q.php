<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Inline;

use de\fburghardt\Library\HTML\Tag\Block\Blockquote;
#endregion

class Q extends Blockquote
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Q'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>