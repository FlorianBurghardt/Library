<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Block;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Wbr extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Wbr'; }
		$this->onlyOpenTag = true;
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>