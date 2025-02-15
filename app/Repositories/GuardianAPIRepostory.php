<?php
namespace App\Repositories;
use GuzzleHttp\Client;

class GuardianAPIRepostory implements GuardianAPIRepostoryInterface {
    public function fetchArticles(): array
    {
        $client = new Client();
        $url = env('GUARDIAN_API_URL');
        $response = $client->get($url, [
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