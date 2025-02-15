<?php
namespace App\Services;

use App\Models\Article;

class NewsService {

    /**
     * The method will receive a Request object and will return 
     * an array of results from database
     * @param Illuminate\Http\Request object;
     * 
     */
    public function searchArticles($request) {
        $query = Article::query();

        if ($request->filled('source')) {
            $query->where('source', 'LIKE', '%' . $request->input('source') . '%');
        }
        
        if ($request->filled('category')) {
            $query->where('category', 'LIKE', '%' . $request->input('category') . '%');
        }

        if ($request->filled('author')) {
            $query->where('author', 'LIKE', '%' . $request->input('author') . '%');
        }

        if ($request->filled('news_date')) {
            $query->where('news_date', '=', $request->input('news_date'));
        }
        
        return $query->get();
    }

}