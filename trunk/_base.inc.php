<?php
//Definizioni di sistema
define('DIR_SEPARATOR',"/");
if(strpos(PHP_OS, "WIN") !== false) {
	define('DIR_SEPARATOR',"\\");
}

//Definizione dei path importanti per le aree di interesse
define("ROOT_PATH",dirname(__FILE__).DIR_SEPARATOR);

define("INCLUDE_PATH",ROOT_PATH."include".DIR_SEPARATOR);
define("FUNCTION_PATH",ROOT_PATH."function".DIR_SEPARATOR);

require_once(INCLUDE_PATH."site_config.php");
?>
