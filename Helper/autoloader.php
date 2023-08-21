<?php
#region usings
namespace de\fburghardt\Library\Helper;
#endregion

#region autoloader
\spl_autoload_register('de\fburghardt\Library\Helper\classLoader');

/**
 * Automatic Class loader
 * @version 1.0 
 * @version lastUpdate 2023/07/06
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
function classLoader(string $class): bool
{
	// print_r($class."<br/>");
	$class = str_replace("\\","/",$class);
	$class = $class.".php";

	$folder_up = "";

	for ($x = 0; $x <= 10; $x++)
	{
		if (file_exists($folder_up.$class))
		{
			// print_r($folder_up.$class."<br/>");
			require_once($folder_up.$class);
			return true;
		}
		$folder_up .= "../";
	}
	return false;
}
#endregion
?>