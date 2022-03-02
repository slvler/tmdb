<?php

/*
 * gerekli olan request isteklerinin atıldığı
 */

class RequestClass {
    private $params = array();





    /*
    public function addParameter($key, $value) {
        $this->params[$key] = $value;
    }

    public function send() {
        $query = http_build_query($this->params);
        // whatever else has to be done to send.
        // for the sake of this example, it just returns the query string:
        return $query;
    }

*/

    function xml_create_request($xmlUrl,$xml)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $xmlUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "xmldata=" . $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;

    }



}