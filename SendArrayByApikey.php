<?php
header('Content-Type: text/html; charset=utf-8');
ini_set("soap.wsdl_cache_enabled", "0");
try {
    //$client= new SoapClient('https://api.kavenegar.com:443/soap/v1.asmx?WSDL',array('trace' => 1));
    $client   = new SoapClient('http://api.kavenegar.com/soap/v1.asmx?WSDL', array(
        'trace' => 1
    ));
    $apikey = '';
    $sender = array(
        "",
        ""
    );
    $message = array(
        "",
        ""
    );
    $receptor = array(
        "",
        ""
    );
    $msgmode = array(
        1,
        1
    );
    $params   = array(
        'apikey' => $apikey,
        'sender' => $sender,
        'message' => $message,
        'receptor' => $receptor,
        'unixdate' => 0,
        'msgmode' => $msgmode,
        'status' => 0,
        'statusmessage' => ''
    );
    $result   = $client->SendArrayByApikey($params);
    if ($result->status == 200) {
        var_dump($result->SendArrayByApikeyResult->long);
    } else {
        echo "status = $result->status & StatusMessage = $result->statusmessage";
    }
}
catch (SoapFault $fault) {
    trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}
?>
