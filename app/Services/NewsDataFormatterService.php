<?php
namespace App\Services;

class NewsDataFormatterService {

    public function formatNewsApiData(array $rawArticles): array {

        $articles = [];
        foreach($rawArticles as $art) {
            $articles[] = array(
               'source' => $art['source']['name'],
                'category' => env('CATEGORY'),
                'author' => $art['author'],
                'heading' => $art['title'],
                'description' => $art['description'],
                'news_date' => substr($art['publishedAt'], 0, 10)
            );
        }

        return $articles;
    }

    public function formatGuardianApiData(array $rawArticles): array {
        $articles = [];
        foreach($rawArticles as $art) {
            $articles[] = array(
               'source' => 'The Guardian',
                'category' => $art['pillarName'],
                'author' => $art['tags'][0]['webTitle'],
                'heading' => '',
                'description' => $art['webTitle'],
                'news_date' => substr($art['webPublicationDate'], 0, 10)
            );
        }
        return $articles;
    }

}