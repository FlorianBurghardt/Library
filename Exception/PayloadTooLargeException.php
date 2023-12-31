<?php
#region usings
namespace de\fburghardt\Library\Exception;

use de\fburghardt\Library\Enum\StatusCode;
#endregion

/**
 * HTTP StatusCode 413 Payload too Large Exception
 * @version 1.0 
 * @version lastUpdate 2023/07/14
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class PayloadTooLargeException extends MyException
{
    private StatusCode $statusCode = StatusCode::PAYLOAD_TOO_LARGE;

	public function __construct(
		string|null $message = null,
		int $innerCode = 0,
		int|null $code = null,
		\Throwable|null $previous = null)
	{
		if (!is_null($message)) { $message = $message; }
		else { $message = "Payload Too Large"; }
		if (!is_null($code)) { $code = StatusCode::tryfrom($code); }
		if (!is_null($code)) { $this->statusCode = $code; }

		parent::__construct($message, $innerCode, $this->statusCode->value, $previous);
	}
}
?>