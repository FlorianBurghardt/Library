<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Head;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Noscript extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Noscript'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>