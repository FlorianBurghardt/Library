<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Table;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Tfoot extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Tfoot'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>