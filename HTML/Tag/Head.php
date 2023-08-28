<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag;

use de\fburghardt\Library\HTML\Enum\TagList;
#endregion

class Head extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Head; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>