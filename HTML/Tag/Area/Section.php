<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Area;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Section extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Section; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>