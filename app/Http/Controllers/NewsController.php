<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function searchArticles(Request $request) {
        $filters = $request->only(['category', 'author']);
        $news = $this->newsService->searchArticles($filters);

        return response()->json($news);
    }
}
