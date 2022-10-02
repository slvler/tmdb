<?php

require __DIR__ . '/../vendor/autoload.php';

use Qwerty\Tmdb\Client;
use Qwerty\Tmdb\Tmdb;


$option = [
        'base_url' => "https://api.themoviedb.org/3/movie/550",
        'api_key' => "b1931f4b871deeec6800ccde48a5f744",
        'version' => '3'
    ];

$client = new Client($option);
$ext = new Tmdb($client);

//echo $ext->movie("550");
//echo $ext->people("13");
//echo $ext->keyword("550");
//echo $ext->network("550");
//echo $ext->review("58aa82f09251416f92006a3a");
//echo $ext->tv("111");
echo $ext->collection("10");

