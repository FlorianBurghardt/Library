<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Block;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class H1 extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'H1'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>