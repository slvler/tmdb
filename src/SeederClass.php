<?php

/*
 * gerekli olan xml dosyalarının hazırlandığı
 *
 */


require_once "repository/Hash.php";


class SeederClass
{

    use Hash;


    private $firstHash;

    private $order;

    private $const;

    private $error;

    private $client;


    private $orderkey;


    /* Mac İşlemleri Valueler */

    private $financal;

    private $EncClientHash;

    /* Mac İşlemleri Valueler Son */


    public function setError()
    {
        return $this->error = "hata";
    }



    /* Success Mac İşlemleri */



    public function getFinancal(): Financal
    {
        return $this->financal;
    }


    public function setFinancal(Financal $value)
    {
        $this->financal = $value;

        return $this;
    }


    public function getEncClientHash()
    {

        $store_key = "67943456";

        $value = $this->financal->getEncKey().";".$store_key;
        $this->EncClientHash = $this->StringHash($value);
        return $this->EncClientHash;
    }

    public function getTotalClientHash()
    {
        //$passwor = hashString($orderId . ";" . $vB . ";" . $curreny . ";" . $clientMid . ";". $firstHash);

       return $this->financal->getCurreny().";".$this->client->getMid().";".$this->getEncClientHash();

    }





    protected function generateHashFinancal()
    {
        try {
            $this->firstHash[] =
                [
                    'posnetid' => $this->financal->getEncKey(),
                ];

            return $this->firstHash;
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }

    /*  Succes Maç İşlemleri Sonu*/


    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $value)
    {
        $this->client = $value;
        return $this;
    }










    public function getConst(): ConstClass
    {
        return $this->const;
    }

    public function setConst(ConstClass $value)
    {
        $this->const = $value;
        return $this;
    }

    public function getOrder(): OrderClass
    {
        return $this->order;
    }

    public function setOrder(OrderClass  $value)
    {
        $this->order = $value;
        return $this;
    }

    public function getXID()
    {

        $value = "DRO".strtoupper(substr(md5(microtime()), 0,17));

        return $this->orderkey = $value;
      
    }


    protected function generateHash()
    {
        try {
            $this->firstHash[] =
                [
                'posnetid' => $this->order->getCardName(),
                'XID' => $this->getXID(),
                'amount' => $this->order->getFormatAmount(),
                'currencyCode' => $this->order->getcurrencyCode(),
                'installment' => $this->order->getInstallment(),
                 'tranType' => $this->order->getTrantype(),
                'cardHolderName' => $this->order->getCardName(),
                'ccno' => $this->order->getFormatCcno(),
                'expDate' => $this->order->getExpDate(),
                'cvc' => $this->order->getCvc()
                ];

            return $this->firstHash;
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }
/*
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


      <posnetRequest>
        <mid>'.$data["mid"].'</mid>
        <tid>'.$data["tid"].'</tid>
        <oosRequestData>
        <posnetid>'.$data["posnetid"].'</posnetid>
        <XID>'.$data["XID"].'</XID>
        <amount>'.$data["amount"].'</amount>
        <currencyCode>'.$data["currencyCode"].'</currencyCode>
        <installment>'.$data["installment"].'</installment>
        <tranType>'.$data["tranType"].'</tranType>
        <cardHolderName>'.$data["cardHolderName"].'</cardHolderName>
        <ccno>'.$data["ccno"].'</ccno>
        <expDate>'.$data["expDate"].'</expDate>
        <cvc>'.$data["cvc"].'</cvc>
        </oosRequestData>
        </posnetRequest>';


*/

    public function getXml()
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $root = $xml->createElement("posnetRequest");
        $mid = $xml->createElement('mid', $this->const->getMid() );
        $tid = $xml->createElement('tid', $this->const->getTid() );

        $root->appendChild($mid);
        $root->appendChild($tid);


        foreach ($this->generateHash() as $hash) {
            $senderNode = $this->createParty($xml, 'oosRequestData', $this->const->getClientId() , $hash['XID'],$hash['amount'],$hash['currencyCode'],$hash['installment'],$hash['tranType'],$hash['cardHolderName'],$hash['ccno'],$hash['expDate'],$hash['cvc'] );

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