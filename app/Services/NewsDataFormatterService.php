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

    public function formatNYTimesApiData(array $rawArticles): array {
        $articles = [];
        foreach($rawArticles as $art) {
            $firstName = $art['byline']['person'][0]['firstname'] ?? 'N.A';
            $lastName = $art['byline']['person'][0]['lastname'] ?? 'N.A';

            $articles[] = array(
               'source' => 'The New York Times',
                'category' => $art['section_name'],
                'author' => $firstName.' '.$lastName,
                'heading' => $art['headline']['main'],
                'description' => $art['abstract'],
                'news_date' => substr($art['pub_date'], 0, 10)
            );
        }
        return $articles;
    }
    
}