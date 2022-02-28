<?php

/*
 * gerekli olan xml dosyalarının hazırlandığı
 *
 */


class SeederClass
{
    private $firstHash = [];


    public function addFirstHash($posnetid, $XID, $amount, $currencyCode, $installment, $tranType, $cardHolderName, $ccno, $expDate, $cvc)
    {
        $this->firstHash[] =
            [
            'posnetid' => $posnetid,
            'XID' => $XID,
            'amount' => $amount,
            'currencyCode' => $currencyCode,
            'installment' => $installment,
            'tranType' => $tranType,
            'cardHolderName' => $cardHolderName,
            'ccno' => $ccno,
            'expDate' => $expDate,
            'cvc' => $cvc
            ];
    }

    public function getXml()
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $root = $xml->createElement("posnetRequest");
        $mid = $xml->createElement('mid',1);
        $tid = $xml->createElement('tid',1);

        $root->appendChild($mid);
        $root->appendChild($tid);


        foreach ($this->firstHash as $hash) {
            $senderNode = $this->createParty($xml, 'oosRequestData', $hash['posnetid'],$hash['XID'],$hash['amount'],$hash['currencyCode'],$hash['installment'],$hash['tranType'],$hash['cardHolderName'],$hash['ccno'],$hash['expDate'],$hash['cvc'] );
            $root->appendChild($senderNode);
        }

        $xml->appendChild($root);

        return $xml->saveXML();
    }

    private function createParty(DOMDocument $xml, $elementName, $posnetid, $XID, $amount, $currencyCode , $installment, $tranType, $cardHolderName, $ccno, $expDate, $cvc)
    {
        $node = $xml->createElement($elementName);

        $node->appendChild($xml->createElement("posnetid", $posnetid));
        $node->appendChild($xml->createElement("XID", $XID));
        $node->appendChild($xml->createElement("amount", $amount));
        $node->appendChild($xml->createElement("currencyCode", $currencyCode));
        $node->appendChild($xml->createElement("installment", $installment));
        $node->appendChild($xml->createElement("tranType", $tranType));
        $node->appendChild($xml->createElement("cardHolderName", $cardHolderName));
        $node->appendChild($xml->createElement("ccno", $ccno));
        $node->appendChild($xml->createElement("expDate", $expDate));
        $node->appendChild($xml->createElement("cvc", $cvc));

        return $node;
    }

}



?>