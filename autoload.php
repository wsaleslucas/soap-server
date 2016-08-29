<?php
spl_autoload_register(function ($class) {
	require_once(str_replace('\\', '/', $class . '.php'));
});

require_once 'vendor/autoload.php';

$serverName = 'http://'.$_SERVER['HTTP_HOST'];

define('FILE_NAME_WSDL', dirname(__FILE__).'/tmp/content.wsdl');
define('SERVER_URI', $serverName);
define('SERVER_LOCATION', "{$serverName}/server.php");
?>
