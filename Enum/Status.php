<?php
#region usings
namespace de\fburghardt\Library\Enum;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/07/03
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
enum Status
{
	case ACTIVE;		// User with login
	case INACTIVE;		// User without login
	case DEACTIVATED;	// User with deactivated login (can be reactivated)
	case REACTIVATE;	// User with deactivated login, reset password for activation
	case BANNED;		// User with deactivated login (permanently deactivated)
}
?>