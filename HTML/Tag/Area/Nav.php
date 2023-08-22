<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Area;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Nav extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Nav'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>