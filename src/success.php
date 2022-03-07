<?php


require_once "autoload.php";


use \qwerty\RequestClass as RequestClass;
use \qwerty\Client as Client;
use \qwerty\Config as Config;

use \qwerty\Financal as Financal;
use \qwerty\ResponseClass as ResponseClass;
use \qwerty\SeederClass as SeederClass;


    $orderId = $_POST["Xid"];
    $amount = $_POST["Amount"];
    $curreny = "TL";
    $bank_data = $_POST["BankPacket"];
    $merchantPacket = $_POST["MerchantPacket"];
    $sing = $_POST["Sign"];
    $encKey = "0,31,17,116,72,45,65,107";

$financalArr = array(
    'enckey' => $encKey,
    'orderId' => $orderId,
    'amount' => $amount,
    'curreny' => $curreny,
    'bank_data' => $bank_data,
    'merchantPacket' => $merchantPacket,
    'sing' => $sing
);






$financal = new Financal($financalArr);



$conf = array(
    'mid' => 'xxxxxxxxxx',
    'tid' => 'xxxxxxxx',
    'clientId' => 'xxxx',
    'clientUser' => 'xxxxxxxx',
    'clientPass' => 'xxxxxxxx',
    'encKey' => 'x,xx,xx,xxx,xxx,xxx,xxx,xxx'
);

$config = new Config($conf);
$client = new Client($config);
$seed = new SeederClass($config);



$financale = $seed->setFinancal($financal);
$xml =  $seed->getXmlSecond();
$query = new RequestClass();
$xmlUrl = 'https://posnet.yapikredi.com.tr/PosnetWebService/XML?';
$query->setXmlUrl($xmlUrl);

$cre_request = $query->xml_create_request($xml);

$reponse = new ResponseClass($cre_request);


$reponse->getRequestClassJson();
$arr = $reponse->getRequestClass();



$xmlData = $seed->getFinancalXml();





$query = new RequestClass();


$xmlUrl = 'https://posnet.yapikredi.com.tr/PosnetWebService/XML?';
$query->setXmlUrl($xmlUrl);


$cre_request = $query->xml_create_request($xmlData);




$reponse = new ResponseClass($cre_request);

//$finance_response = json_decode(json_encode(simplexml_load_string($cre_request)), true);
//print_r($finance_response);
$arr =  $reponse->getRequestClassJson();



?>