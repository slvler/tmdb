# Qwerty - TMDB service

An api service for tmdb.com


## Installation

To install this package tou can use composer:

```bash
    composer require qwerty/tmdb-service
```



## Usage 

```php

    $tmdb = new Tmdb();
    $movie = $tmdb->getAll();

```