<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Block;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class H4 extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::H4; }
		parent::__construct($attributes);
	}
	#endregion
}
?>