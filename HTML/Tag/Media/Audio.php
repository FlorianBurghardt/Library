<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Tag\Abstract\AbstractPlayable;
#endregion

class Audio extends AbstractPlayable
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Audio'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>