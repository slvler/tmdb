<?php

namespace Qwerty\Tmdb;

class Client implements ClientInterface
{
    protected $init;
    protected $base_url;
    protected $api_key;
    protected $version;

    public function __construct(array $option) {

        $this->base_url = $option['base_url'];
        $this->api_key = $option['api_key'];
        $this->version = $option['version'];
        $this->init = curl_init();
    }

    public function apiKeys($keys, $value)
    {
        $Arr = ['api_key' => $this->api_key ];
        return "https://api.themoviedb.org/3/".$keys."/". $value . '?' . http_build_query($Arr);
    }

    public function setOpt($arr)
    {
        curl_setopt($this->init, CURLOPT_URL, $arr);
        curl_setopt($this->init, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->init, CURLOPT_CONNECTTIMEOUT, 300);
        return curl_exec($this->init);
    }

    public function result($keys, $value)
    {
        $arr = $this->apiKeys($keys, $value);
        return $this->createResponse($this->setOpt($arr));
    }

    public function createResponse($data)
    {
        return $data;
    }



}