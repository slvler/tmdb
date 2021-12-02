<?php

require_once "src/general.php";


$tid = "123456789";
$cid = "123456";

$general = new general($tid,$cid);


$general->build();