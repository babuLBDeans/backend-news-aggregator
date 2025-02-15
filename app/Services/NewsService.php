<?php
namespace App\Services;

use App\Models\Article;

class NewsService {

    public function searchArticles($filters) {
        $query = Article::query();

        if (!empty($filters['category'])) {
            $query->where('category', 'LIKE', '%' .  $filters['category'] . '%');
        }

        if (!empty($filters['author'])) {
            $query->where('author', 'LIKE', '%' . $filters['author'] . '%');
        }

        return $query->get();
    }

}