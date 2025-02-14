<?php
namespace App\Services;

use App\Repositories\GuardianAPIRepostoryInterface;
use App\Repositories\NewsAPIRepositoryInterface;
use App\Repositories\ServicesInterface;
use Illuminate\Support\Facades\Log;

class ArticleService implements ServicesInterface {
    private $newsApiRepository;
    private $newsDataFormatterService;
    private $guardianApiRepository;
    public function __construct(NewsAPIRepositoryInterface $newsApiRepository,
            GuardianAPIRepostoryInterface $guardianApiRepository) {
        $this->newsApiRepository = $newsApiRepository;
        $this->guardianApiRepository = $guardianApiRepository;
        $this->newsDataFormatterService = new NewsDataFormatterService();
    }

    /**
     * The below method invokes the fetchArticles method in NewsApiRepository
     * 
     */
    public function fetchNewsApiArticles() : array {

        $rawArticles = $this->newsApiRepository->fetchArticles();

        
        $articles = $this->newsDataFormatterService->formatNewsApiData($rawArticles);
        Log::info('News api articles received');
        return $articles;
    }

    /**
     * The below method invokes the fetchArticles method in GuradianApiRepository
     * 
     */
    public function fetchGuardianApiArticles() : array {
        $rawArticles = $this->guardianApiRepository->fetchArticles();
        // Log::info($rawArticles);
        $articles = $this->newsDataFormatterService->formatGuardianApiData($rawArticles);
        Log::info($articles);
        return $articles;
    }

}