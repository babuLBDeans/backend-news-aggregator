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

    /**
     * @param Illuminate\Http\Requestobject from The calling end.
     * @return json response
     * 
     */
    public function searchArticles(Request $request) {
        $news = $this->newsService->searchArticles($request);

        return response()->json($news);
    }
}
