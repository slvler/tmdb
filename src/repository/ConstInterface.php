<?php declare(strict_types=1);

//namespace PHPCurl\CurlWrapper;

interface ConstInterface
{
    /**
     * @param string $url URL
     * @return void
     * @see curl_init()
     *
     */
    public function __construct(array $name);

    public function setPostUrl($value);

    public function getPostUrl($value): string;


}