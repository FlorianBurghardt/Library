<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Tag\Abstract\AbstractLink;
#endregion

class Canvas extends AbstractLink
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Canvas'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>