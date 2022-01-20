<?php


class ConstClass{

    protected $ApiUrl;
    protected $XmlUrl;
    protected $Tid;
    protected $Mid;
    protected $ClientId;
    protected $ClientPass;
    protected $ClientUser;


    public function __construct($ApiUrl,$XmlUrl)
    {
        $this->ApiUrl = $ApiUrl;
        $this->XmlUrl = $XmlUrl;
    }

}
?>