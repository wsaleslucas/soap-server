<?php
require_once 'autoload.php';

$cache_file = FILE_NAME_WSDL;
$cache_life = '86400'; //caching time, in seconds
$filemtime = @filemtime($cache_file);

if ((time() - $filemtime >= $cache_life) || !file_exists(FILE_NAME_WSDL)) {
	new \SoapServer\GenerateWsdl();
}

$options = [
	'uri' => SERVER_URI,
	'encoding' => 'UTF-8',
	'verifypeer' => false,
	'verifyhost' => false,
	'use' => SOAP_LITERAL,
	'soap_version' => SOAP_1_1,
	'trace' => true,
	'location' => 'http://soap-server.mobly.dev:81',
	'compression' => 0,
	'exceptions' => true,
	'connection_timeout' => 3,
	'cache_wsdl' => WSDL_CACHE_NONE,
];


////create a new SOAP server
$server = new \SoapServer(FILE_NAME_WSDL, $options);
////attach the API class to the SOAP Server
$server->setClass(get_class(new \SoapServer\MethodsServer()));
////start the SOAP requests handler
$server->handle();

?>
