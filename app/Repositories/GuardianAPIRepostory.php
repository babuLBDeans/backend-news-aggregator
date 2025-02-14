<?php
namespace App\Repositories;
use GuzzleHttp\Client;

class GuardianAPIRepostory implements GuardianAPIRepostoryInterface {
    public function fetchArticles(): array
    {
        $client = new Client();
        /**
         * https://content.guardianapis.com/search?
         * api-key=48c647e7-c28e-47ea-8db6-10c52b8c4526&lang=en&
         * pageSize=10&page=1&q=sports%20or%20election&type=article&show-tags=contributor
        */
        $response = $client->get('https://content.guardianapis.com/search', [
            'query' => [
                'api-key' => env('GUARDIAN_API_KEY'),
                'lang' => env('LANGUAGE'),
                'pageSize' => env('PAGE_SIZE'),
                'page' => env('PAGE'),
                'q' => env('CATEGORY'),
                'type' => 'article',
                'show-tags' => 'contributor'
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true)['response']['results'];
    }
}