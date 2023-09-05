<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Inline;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Kbd extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Kbd; }
		parent::__construct($attributes);
	}
	#endregion
}
?>