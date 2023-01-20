<?php



class TmdbAPITest extends \PHPUnit\Framework\TestCase
{
    public function testMovie()
    {
        $option = [
            'base_url' => "https://api.themoviedb.org/3/movie/550",
            'api_key' => "b1931f4b871deeec6800ccde48a5f744",
            'version' => '3'
        ];

        $client = new slvler\tmdb\Client($option);
        $tmdb = new slvler\tmdb\Tmdb($client);
        $people = $tmdb->movie("550");

        $this->assertIsString($people);
    }

    public function testPeople()
    {
        $option = [
            'base_url' => "https://api.themoviedb.org/3/movie/550",
            'api_key' => "b1931f4b871deeec6800ccde48a5f744",
            'version' => '3'
        ];

        $client = new slvler\tmdb\Client($option);
        $tmdb = new slvler\tmdb\Tmdb($client);
        $people = $tmdb->people("13");

        $this->assertIsString($people);
    }

    public function testKeyword()
    {
        $option = [
            'base_url' => "https://api.themoviedb.org/3/movie/550",
            'api_key' => "b1931f4b871deeec6800ccde48a5f744",
            'version' => '3'
        ];

        $client = new slvler\tmdb\Client($option);
        $tmdb = new slvler\tmdb\Tmdb($client);
        $keyword = $tmdb->keyword("550");

        $this->assertIsString($keyword);
    }

    public function testNetwork()
    {
        $option = [
            'base_url' => "https://api.themoviedb.org/3/movie/550",
            'api_key' => "b1931f4b871deeec6800ccde48a5f744",
            'version' => '3'
        ];

        $client = new slvler\tmdb\Client($option);
        $tmdb = new slvler\tmdb\Tmdb($client);
        $network = $tmdb->network("550");

        $this->assertIsString($network);
    }

    public function testReview()
    {
        $option = [
            'base_url' => "https://api.themoviedb.org/3/movie/550",
            'api_key' => "b1931f4b871deeec6800ccde48a5f744",
            'version' => '3'
        ];

        $client = new slvler\tmdb\Client($option);
        $tmdb = new slvler\tmdb\Tmdb($client);
        $review = $tmdb->review("58aa82f09251416f92006a3a");

        $this->assertIsString($review);
    }

    public function testTv()
    {
        $option = [
            'base_url' => "https://api.themoviedb.org/3/movie/550",
            'api_key' => "b1931f4b871deeec6800ccde48a5f744",
            'version' => '3'
        ];

        $client = new slvler\tmdb\Client($option);
        $tmdb = new slvler\tmdb\Tmdb($client);
        $tv = $tmdb->tv("111");

        $this->assertIsString($tv);
    }

    public function testCollection()
    {
        $option = [
            'base_url' => "https://api.themoviedb.org/3/movie/550",
            'api_key' => "b1931f4b871deeec6800ccde48a5f744",
            'version' => '3'
        ];
        
        $client = new slvler\tmdb\Client($option);
        $tmdb = new slvler\tmdb\Tmdb($client);
        $collection = $tmdb->collection("10");

        $this->assertIsString($collection);
    }

}