<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractLink;
#endregion

class Canvas extends AbstractLink
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Canvas; }
		parent::__construct($attributes);
	}
	#endregion
}
?>