<?php
namespace SoapServer;

use PHP2WSDL\PHPClass2WSDL;

class GenerateWsdl 
{

	public function __construct()
	{
		$wsdlGenerator = new PHPClass2WSDL(get_class(new MethodsServer()), SERVER_URI);
		// Generate thw WSDL from the class adding only the public methods that have @soap annotation.
		$wsdlGenerator->generateWSDL(true);
		$wsdlXML = $wsdlGenerator->dump();
		$wsdlXML = str_replace('<soap:address location="'.SERVER_URI.'"/>',
			'<soap:address location="'.SERVER_LOCATION.'"/>', $wsdlXML);

		if (file_exists(FILE_NAME_WSDL)) {
			unlink(FILE_NAME_WSDL);
		}

		file_put_contents(FILE_NAME_WSDL, $wsdlXML);
		chmod(FILE_NAME_WSDL, 0777);
	}

}


