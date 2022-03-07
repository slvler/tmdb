<?php

require_once "autoload.php";


use \qwerty\RequestClass as RequestClass;
use \qwerty\Client as Client;
use \qwerty\Config as Config;
use \qwerty\OrderClass as OrderClass;
use \qwerty\ResponseClass as ResponseClass;
use \qwerty\SeederClass as SeederClass;



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


$orderData = array(
    'amount' => "x",
    'installment' => 'x',
    'tranType' =>  'Sale',
    'cardName' => 'xxxxx xxxxxxxxx',
    'ccno' => 'xxxx xxxx xxxx xxxx',
    'expDate' => 'xxxx',
    'cvc' => 'xxx',
    'currencyCode' => 'TL'
);


$order = new OrderClass($orderData);



$seed = new SeederClass($config);


$seed->setOrder($order);
$xmlData = $seed->getXml();



$query = new RequestClass();


$xmlUrl = 'https://posnet.yapikredi.com.tr/PosnetWebService/XML?';
$query->setXmlUrl($xmlUrl);



$cre_request = $query->xml_create_request($xmlData);



$reponse = new ResponseClass($cre_request);



$arr =  $reponse->getRequestClassJson();
$rest = $reponse->ResponseRequest();
echo $rest;


?>