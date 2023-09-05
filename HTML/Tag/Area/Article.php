<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Area;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Article extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Article; }
		parent::__construct($attributes);
	}
	#endregion
}
?>