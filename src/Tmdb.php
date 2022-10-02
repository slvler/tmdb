<?php

namespace Qwerty\Tmdb;

class Tmdb
{
    private $id;

    public function __construct(ClientInterface $client)
    {
        $this->id = $client;
    }

    public function movie($movie)
    {
       return $this->id->result("movie", $movie);

    }
    public function people($people)
    {
        return $this->id->result('person', $people);
    }

    public function keyword($keyword)
    {
        return $this->id->result("keyword", $keyword);
    }

    public function network($network)
    {
        return $this->id->result("network", $network);
    }

    public function review($review)
    {
        return $this->id->result("review", $review);
    }

    public function tv($tv)
    {
        return $this->id->result("tv", $tv);
    }

    public function collection($collection)
    {
        return $this->id->result("collection", $collection);
    }



}