<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Abstract\AbstractMedia;
#endregion

class Svg extends AbstractMedia
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Svg; }
		parent::__construct($attributes);
	}
	#endregion
}
?>