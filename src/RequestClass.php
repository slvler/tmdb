<?php

/*
 * gerekli olan request isteklerinin atıldığı
 */


class RequestClass {
    private $params = array();

    public function addParameter($key, $value) {
        $this->params[$key] = $value;
    }

    public function send() {
        $query = http_build_query($this->params);
        // whatever else has to be done to send.
        // for the sake of this example, it just returns the query string:
        return $query;
    }
}