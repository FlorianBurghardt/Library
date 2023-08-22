<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Inline;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Strong extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Strong'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>