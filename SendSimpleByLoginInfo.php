<?php
header('Content-Type: text/html; charset=utf-8');
ini_set("soap.wsdl_cache_enabled", "0");
try {
    //$client= new SoapClient('https://api.kavenegar.com:443/soap/v1.asmx?WSDL',array('trace' => 1));
    $client   = new SoapClient('http://api.kavenegar.com/soap/v1.asmx?WSDL', array(
        'trace' => 1
    ));
    $userName = '';
    $password = '';
    $sender   = '';
    $message  = '';
    $receptor = array(
        ""
    );
    $params   = array(
        'userName' => $userName,
        'password' => $password,
        'sender' => $sender,
        'message' => $message,
        'receptor' => $receptor,
        'unixdate' => 0,
        'msgmode' => 1,
        'status' => '',
        'statusmessage' => ''
    );
    $result   = $client->SendSimpleByLoginInfo($params);
    if ($result->status == 200) {
        var_dump($result->SendSimpleByLoginInfoResult->long);
    } else {
        echo "status = $result->status & StatusMessage = $result->statusmessage";
    }
}
catch (SoapFault $fault) {
    trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}
?>
