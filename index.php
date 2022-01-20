<?php



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

require_once "src/SeederClass.php";
require_once "src/RequestClass.php";

//header("Content-Type: application/xml;");

$seed = new SeederClass();
$query = new RequestClass();

$seed->addFirstHash('Origin', '192.168.0.2', 'Party sending the information',"1","2","3","4","5","6","7");
$xml =  $seed->getXml();

$query->addParameter("https://setmpos.ykb.com/PosnetWebService/XML?xmldata=", $xml);
echo $query ->send(); // echos 'username=abc&password=foobar'