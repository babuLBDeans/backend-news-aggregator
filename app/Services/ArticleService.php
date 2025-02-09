<?php
namespace App\Services;
use App\Repositories\NewsAPIRepositoryInterface;
use App\Repositories\ServicesInterface;
use Illuminate\Support\Facades\Log;

class ArticleService implements ServicesInterface {
    private $newsApiRepository;
    private $newsDataFormatterService;
    public function __construct(NewsAPIRepositoryInterface $newsApiRepository) {
        $this->newsApiRepository = $newsApiRepository;
        $this->newsDataFormatterService = new NewsDataFormatterService();
    }

    /**
     * The below method overrides the fetchNewsApiArticles method in ServicesInterface
     * 
     */
    public function fetchNewsApiArticles() : array {

        $rawArticles = $this->newsApiRepository->fetchArticles();

        
        $articles = $this->newsDataFormatterService->formatNewsApiData($rawArticles);
        Log::info($articles);
        return $articles;
    }
}