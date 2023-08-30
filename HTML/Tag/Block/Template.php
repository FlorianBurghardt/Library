<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Block;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Template extends Body
{
	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Template; }
		parent::__construct($input);
	}
	#endregion
}
?>