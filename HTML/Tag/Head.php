<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag;
#endregion

class Head extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Head'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>