<?php

class SeederClass {
    private $sender=[];
    private $receiver=[];

    public function setParty($name, $addr, $descr) {
        $res['name']=$name;
        $res['addr']=$addr;
        $res['descr']=$descr;
        return $res;
    }

    public function setSender($name, $addr, $descr) {
        $this->sender=$this->setParty($name,$addr,$descr);
    }

    public function setReceiver($name, $addr, $descr) {
        $this->receiver=$this->setParty($name,$addr,$descr);
    }

    public function setXmlParty(SimpleXMLElement $node, $party) {
        $node->name=$party['name'];
        $node->addr=$party['addr'];
        $node->descr=$party['descr'];
    }

    public function getxml() {
        $xml=new SimpleXMLElement('<test/>');
        $this->setXmlParty($xml->addChild('sender'),$this->sender);
        $this->setXmlParty($xml->addChild('receiver'),$this->receiver);
        return $xml->asXML();
    }
}
