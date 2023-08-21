<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Table;

use de\fburghardt\Library\HTML\Tag\Abstract\AbstractTableCol;
#endregion

class Colgroup extends AbstractTableCol
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Colgroup'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>