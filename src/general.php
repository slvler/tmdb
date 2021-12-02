<?php


class general extends Request
{
    protected $apiUrl = "";
    protected $xmlUrl = "";
    protected $terminalId = "";
    protected $clientId = "";
    protected $userId = "";
    protected $UserPass = "";


    public function __construct($terminalId,$clientId)
    {
        $this->terminalId = $terminalId;
        $this->clientId = $clientId;

    }


    public function index()
    {

    }


}