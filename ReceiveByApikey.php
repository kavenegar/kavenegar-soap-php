<?php
header('Content-Type: text/html; charset=utf-8');
ini_set("soap.wsdl_cache_enabled", "0");
try {
    //$client= new SoapClient('https://api.kavenegar.com:443/soap/v1.asmx?WSDL',array('trace' => 1));
    $client   = new SoapClient('http://api.kavenegar.com/soap/v1.asmx?WSDL', array(
        'trace' => 1
    ));
    $apikey = '';
    $lineNumber = '';
    $isread = 1;
    $params   = array(
        'apikey' => $apikey,
        'lineNumber' => $lineNumber,
        'isread' => $isread,
        'status' => 0,
        'statusmessage' => ''
    );
    $result = $client->ReceiveByApikey($params);
    if ($result->status == 200) {
        var_dump($result->ReceiveByApikeyResult);
    } else {
        echo "status = $result->status & StatusMessage = $result->statusmessage";
    }
}
catch (SoapFault $fault) {
    trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}
?>
