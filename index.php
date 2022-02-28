<?php

/*

/*

$ss = '<?xml version="1.0" encoding="ISO-8859-9"?>
<posnetRequest>
<mid>6706022701</mid>
<tid>67002706</tid> 
<oosRequestData>
<posnetid>142</posnetid>
<XID>YKB_0000080603143050</XID>
<amount>5696</amount>
<currencyCode>TL</currencyCode>
<installment>00</installment>
<tranType>Sale</tranType>
<cardHolderName>ĞğÜüİıŞşÖöÇç</cardHolderName>
<ccno>5400637500005263</ccno>
<expDate>0607</expDate>
<cvc>111</cvc>
</oosRequestData>
</posnetRequest>';

*/
/*
require_once "src/SeederClass.php";
require_once "src/RequestClass.php";
*/
//header("Content-Type: application/xml;");

/*

//$seed = new SeederClass();
//$query = new RequestClass();

$seed->addFirstHash('Origin', '192.168.0.2', 'Party sending the information',"1","2","3","4","5","6","7");
$xml =  $seed->getXml();


echo $xml;


$query->addParameter("https://setmpos.ykb.com/PosnetWebService/XML?xmldata=", $xml);
echo $query ->send(); // echos 'username=abc&password=foobar'

*/


require_once "src/ConstClass.php";
require_once 'src/OrderClass.php';



$post = "https://posnet.yapikredi.com.tr/3DSWebService/YKBPaymentService";
$api = "https://posnet.yapikredi.com.tr/PosnetWebService/XML";
$tid = "67943456";
$mid = "6735527290";
$clientId = "8822";
$clientUser = "2wpylql9";
$clientPass = "0zk28hhz";


$constArr = array(
  'post' => $post,
  'api' => $api,
  'tid' => $tid,
    'mid' => $mid,
    'clientId' => $clientId,
    'clientUser' => $clientUser,
    'clientPass' => $clientPass
);

$const = new ConstClass($constArr);

/*
echo $const->getPostUrl();
echo $const->getXmlUrl();

echo $const->getTid();
echo $const->getMid();

echo $const->getClientId();
echo $const->getClientUser();
echo $const->getClientPass();
*/


/*
$xmlCreateData = array(
    'mid' => $clientMid,
    'tid' => $clientTId,
    'posnetid' => $clientPostnetId,
    'XID' =>  $data["XID"],
    'amount' => $amount,
    'currencyCode' => $currencyCode,
    'installment' => $data["instalment"],
    'tranType' => $tranType,
    'cardHolderName' => $data["custName"],
    'ccno' => $data["ccno"],
    'expDate' => $data["expdate"],
    'cvc' => $data["cvv"]

);
*/

$order = array(
  'amount' => "123.12",
  'installment' => '1',
  'tranType' =>  'Sale',
  'cardName' => 'John',
  'ccno' => '999 0000          0000 000',
  'expDate' => '123',
  'cvc' => '999'
);

$ord = new OrderClass($order);

echo $ord->getFormatAmount();

echo $ord->getFormatCcno();


?>