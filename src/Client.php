<?php

/*
 * sabit değişkenlerin ve verilerin kullanıldığı
 */



class Client{




    private $PostUrl;
    private $XmlUrl;

    private $Tid;
    private $Mid;

    private $ClientId;
    private $ClientPass;
    private $ClientUser;


    public function __construct(?array $ConstClass = [])
    {
        if ($ConstClass) {
            $this->setPostUrl($ConstClass['post']);
            $this->setXmlUrl($ConstClass['api']);

            $this->setTid($ConstClass['tid']);
            $this->setMid($ConstClass['mid']);

            $this->setClientId($ConstClass['clientId']);
            $this->setClientUser($ConstClass['clientUser']);
            $this->setClientPass($ConstClass['clientPass']);
        }
    }



    function setPostUrl($value)
    {
        $this->PostUrl = $value;
    }

    function getPostUrl(): string
    {
        return $this->PostUrl;
    }

    function setXmlUrl($value)
    {
        $this->XmlUrl = $value;
    }

    function getXmlUrl(): string
    {
        return $this->XmlUrl;
    }


    function setTid($value)
    {
        return $this->Tid = $value;
    }

    function getTid(): string
    {
        return $this->Tid;
    }

    function setMid($value)
    {
        $this->Mid = $value;
    }

    function getMid(): string
    {
        return $this->Mid;
    }

    function setClientId($value)
    {
        return $this->ClientId = $value;
    }

    function getClientId(): string
    {
        return $this->ClientId;
    }

    function setClientPass($value)
    {
        return $this->ClientPass = $value;
    }

    function getClientPass(): string
    {
        return $this->ClientPass;
    }


    function setClientUser($value)
    {
        return $this->ClientUser = $value;
    }

    function getClientUser(): string
    {
        return $this->ClientUser;
    }



}



?>