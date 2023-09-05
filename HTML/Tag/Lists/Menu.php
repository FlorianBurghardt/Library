<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Lists;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractList;
#endregion

class Menu extends AbstractList
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Menu; }
		parent::__construct($attributes);
	}
	#endregion
}
?>