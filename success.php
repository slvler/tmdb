<?php 

    $orderId = $_POST["Xid"];
    $amount = $_POST["Amount"];
    $curreny = "TL";
    $bank_data = $_POST["BankPacket"];
    $merchantPacket = $_POST["MerchantPacket"];
    $sing = $_POST["Sign"];


require_once "src/Financal.php";

require_once "src/Client.php";

require_once "src/SeederClass.php";






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
    'clientPass' => $clientPass,
);



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

$const = new Client($constArr);


$financal = new Financal($financalArr);


$seed = new SeederClass();

//print_r($_POST);

$consttt = $seed->setClient($const);


//print_r($consttt);

$fiannn = $seed->setFinancal($financal);

//print_r($fiannn);

echo $seed->getTotalClientHash();



?>