<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Tag\Abstract\AbstractMedia;

#endregion

class Svg extends AbstractMedia
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Svg'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>