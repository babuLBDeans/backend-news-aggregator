<?php
namespace App\Repositories;
use GuzzleHttp\Client;

class NewyorkTimesAPIRepostory implements NewyorkTimesAPIRepostoryInterface {
    public function fetchArticles(): array
    {
        $client = new Client();
        $url = env('NEWYORK_TIMES_API_URL');
        $response = $client->get('', [
            'query' => [
                'api-key' => env('NY_TIMES_API_KEY'),
                'fq' => env('CATEGORY')
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true)['response']['docs'];
    }
    
}