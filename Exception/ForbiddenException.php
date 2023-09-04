<?php
#region usings
namespace de\fburghardt\Library\Exception;

use de\fburghardt\Library\Enum\StatusCode;
#endregion

/**
 * HTTP StatusCode 403 Forbidden Exception
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class ForbiddenException extends MyException
{
    private StatusCode $statusCode = StatusCode::FORBIDDEN;

	public function __construct(
		string|null $message = null,
		int $innerCode = 0,
		int|null $code = null,
		\Throwable|null $previous = null)
	{
		if (!is_null($message)) { $message = $message; }
		else { $message = "Forbidden"; }
		if (!is_null($code)) { $code = StatusCode::tryfrom($code); }
		if (!is_null($code)) { $this->statusCode = $code; }

		parent::__construct($message, $innerCode, $this->statusCode->value, $previous);
	}
}
?>