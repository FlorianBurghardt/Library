<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Lists;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Dt extends Body
{
	#region constructor
    public function __construct(array|null $input = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Dt; }
		parent::__construct($input);
	}
	#endregion
}
?>