# Qwerty - TMDB service

[![Latest Stable Version](http://poser.pugx.org/qwerty/tmdb/v)](https://packagist.org/packages/qwerty/tmdb)
[![Latest Unstable Version](http://poser.pugx.org/qwerty/tmdb/v/unstable)](https://packagist.org/packages/qwerty/tmdb)
[![License](http://poser.pugx.org/qwerty/tmdb/license)](https://packagist.org/packages/qwerty/tmdb)



An api service for tmdb.com


## Installation

To install this package tou can use composer:

```bash
    composer require qwerty/tmdb
```

## Usage 



- first step is to start client client with required url, version, api key

```php
    $option = [
            'base_url' => "https://api.themoviedb.org/3/",
            'api_key' => "xxxx",
            'version' => '3'
        ];

     $client = new Client($option);


```

 - You need to make a request to the tmdb service with the service point we created.

```php

     $TMDB = new Tmdb($client);

```
- Then you can send a request like this to bring the information of the movie we want.

```php

    $TMDB->movie("550");

```
- You can it to fetch player information.

```php

    $TMDB->people("13");

```
- to search on the specified keyword

```php

    $TMDB->keyword("550");

```
- to search in the specified condition

```php

    $TMDB->network("550");

```
- You can it to search in specified situations.

```php

    $TMDB->review("58aa82f09251416f92006a3a");

```

- You want this service when you want a TV program.

```php

    $TMDB->tv("111");

```
-  movies with collection

```php

    $TMDB->collection("10");

```
