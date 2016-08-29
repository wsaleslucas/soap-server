<?php

ini_set('default_socket_timeout', 3);


//$wsdl = 'http://soap-server.mobly.dev:81/server.php?wsdl';
$wsdl = 'http://soap-server.mobly.dev/server.php?wsdl';
//$options =
//	[
//		'encoding' => 'UTF-8',
//		'verifypeer' => false,
//		'verifyhost' => false,
//		'use' => SOAP_LITERAL,
//		'soap_version' => SOAP_1_1,
//		'trace' => true,
//		'location' => ,
//		'compression' => 0,
//		'exceptions' => true,
//		'connection_timeout' => 5,
//		'uri' => '',
//		'cache_wsdl' => WSDL_CACHE_NONE,
//	];

$options = [
	'location' => "http://soap-server.mobly.dev/server.php?wsdl",
  	'encoding' =>"ISO-8859-1",
  	'verifypeer' =>false,
  	'verifyhost' =>false,
  	'soap_version' => SOAP_1_2,
  	'trace' => true,
  	'compression' => 0,
	'exceptions' => true,
  	'connection_timeout' => 60,
  	'cache_wsdl' => 0,
  	'uri' => ""
];


//
//
//
//$api = new \SoapClient($wsdl, $options);
//echo $api->hello();
//echo "<br /> gaaggmmm";
//exit;



//
//$options = array(
//		'encoding' => 'UTF-8',
//		'verifypeer' => false,
//		'verifyhost' => false,
//		'use' => SOAP_LITERAL,
//		'soap_version' => SOAP_1_1,
//		'trace' => true,
//		'location' => null,
//		'compression' => 0,
//		'exceptions' => true,
//		'connection_timeout' => 60,
//		'uri' => '',
//		'cache_wsdl' => WSDL_CACHE_NONE,
//	);
//
////$options=array('uri'=>'http://soap-server.mobly.dev:81');
//
$call = "create";
$data = ['<request store="MOB" total="1" venture="MOB">
        <queue id="1" total="1">
            <fields item_no="1">
                <cliente></cliente>
                <email></email>
                <tax_identification unique="1"></tax_identification>
                <order_id>1898241</order_id>
                <order_number>705436279</order_number>
                <lista_produto>lista de produtos</lista_produto>
                <enviar_email>0</enviar_email>
                <sms_message>teste</sms_message>
                <items>
                    <item>
                        <fields item_no="1">
                            <itens_venda_id>4180799</itens_venda_id>
                            <sku>EC516MA53LYCMOB-169037</sku>
                            <item_descricao>Colchão De Mola Ensacada Elegance Ecoflex 25 cm Alt</item_descricao>
                            <item_valor></item_valor>
                            <search_key_1></search_key_1>
                            <search_key_2></search_key_2>
                            <search_key_3></search_key_3>
                        </fields>
                    </item>
                </items>
            </fields>
        </queue>
    </request>'];


try {
	$client = new \SoapClient($wsdl, $options);
	//$client->hello();
	//echo $client->$call($data);
	$response = $client->__soapCall($call, $data);

} catch (Exception $ex) {
	var_dump($ex);
}
var_dump($response);
?>