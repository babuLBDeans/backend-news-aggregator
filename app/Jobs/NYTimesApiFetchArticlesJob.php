<?php
namespace App\Jobs;

use App\Models\Article;
use App\Repositories\ServicesInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class NYTimesApiFetchArticlesJob implements ShouldQueue {
    use Queueable;

    protected $articleService;

    public function __construct(ServicesInterface $articleService)
    {
        $this->articleService = $articleService;
    }

    public function handle()
    {
        $articles = $this->articleService->fetchNYTimesApiArticles();

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}