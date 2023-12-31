<?php
#region usings
namespace de\fburghardt\Library\Exception;
#endregion

/**
 * Main exception for internal exception handling
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class MyException extends \Exception
{
	#region properties
	protected int $innerCode;
	#endregion

	#region constructor
	public function __construct(
		string $message = "",
		int $innerCode = 0,
		int $code = 0,
		\Throwable|null $previous = null)
	{
		parent::__construct($message, $code, $previous);
		$this->innerCode = $innerCode;

	}
	#endregion

	#region getter / setter
	final public function getInnerCode(): int { return $this->innerCode; }
	final public function setInnerCode(int $innerCode): void { $this->innerCode = $innerCode; }
	#endregion
}
?>