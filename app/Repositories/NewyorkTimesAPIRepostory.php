<?php
namespace App\Repositories;
use GuzzleHttp\Client;

class NewyorkTimesAPIRepostory implements NewyorkTimesAPIRepostoryInterface {
    public function fetchArticles(): array
    {
        $client = new Client();
       /**
        * https://api.nytimes.com/svc/search/v2/articlesearch.json?
        * fq=news_desk:(%22Sports%22,%20%22Foreign%22)&
        * api-key=vDQsnVw6vrdsg2863ZkPWqbADlvFLFWy
        */
        $response = $client->get('https://api.nytimes.com/svc/search/v2/articlesearch.json', [
            'query' => [
                'api-key' => env('NY_TIMES_API_KEY'),
                'fq' => env('CATEGORY')
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true)['response']['docs'];
    }
    
}