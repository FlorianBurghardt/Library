<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Media;

use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Figcaption extends Body
{
	#region constructor
    public function __construct(array|null $input = null, string|null $tagID = null)
	{
		if (!isset($this->tagType)) { $this->tagType = 'Figcaption'; }
		parent::__construct($input, $tagID);
	}
	#endregion
}
?>