<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Lists;

use de\fburghardt\Library\HTML\Tag\Abstract\AbstractList;
#endregion

class Menu extends AbstractList
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Menu'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>