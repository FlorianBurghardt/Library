<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Form;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Datalist extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Datalist'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>