<?php
#region usings
namespace de\fburghardt\Library\HTML\Tag\Form;

use de\fburghardt\Library\HTML\Enum\TagList;
use de\fburghardt\Library\HTML\Tag\Body;
#endregion

class Datalist extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Datalist; }
		parent::__construct($attributes);
	}
	#endregion
}
?>