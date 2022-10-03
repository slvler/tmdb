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

```php

    $tmdb = new Tmdb();
    $movie = $tmdb->getAll();

```
