<?php
namespace App\Repositories;
use App\Repositories\NewsAPIRepositoryInterface;
use GuzzleHttp\Client;

class NewsAPIRepository implements NewsAPIRepositoryInterface {
    
    public function fetchArticles(): array
    {
        $client = new Client();
        $url = env('NEWS_API_URL');

        $response = $client->get($url, [
            'query' => [
                'apiKey' => env('NEWS_API_KEY'),
                'sortBy' => 'publishedAt',
                'q' => env('CATEGORY'),
                'language' => env('LANGUAGE'),
                'pageSize' => env('PAGE_SIZE'),
                'page' => env('PAGE')
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true)['articles'];
    }
}