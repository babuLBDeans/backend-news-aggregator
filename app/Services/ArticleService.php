<?php
namespace App\Services;

use App\Repositories\GuardianAPIRepostoryInterface;
use App\Repositories\NewsAPIRepositoryInterface;
use App\Repositories\NewyorkTimesAPIRepostoryInterface;
use App\Repositories\ServicesInterface;
use Illuminate\Support\Facades\Log;

class ArticleService implements ServicesInterface {
    private $newsApiRepository;
    private $newsDataFormatterService;
    private $guardianApiRepository;
    private $nyTimesApiRepository;

    public function __construct(NewsAPIRepositoryInterface $newsApiRepository,
            GuardianAPIRepostoryInterface $guardianApiRepository,
            NewyorkTimesAPIRepostoryInterface $nyTimesApiRepository) {
        $this->newsApiRepository = $newsApiRepository;
        $this->guardianApiRepository = $guardianApiRepository;
        $this->nyTimesApiRepository = $nyTimesApiRepository;

        $this->newsDataFormatterService = new NewsDataFormatterService();
    }

    /**
     * The below method invokes the fetchArticles method in NewsApiRepository
     * @return The method will return an array of articles
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
     * @return The method will return an array of articles
     * 
     */
    public function fetchGuardianApiArticles() : array {
        $rawArticles = $this->guardianApiRepository->fetchArticles();
        $articles = $this->newsDataFormatterService->formatGuardianApiData($rawArticles);
        Log::info('The guardian api articles received');
        return $articles;
    }

    /**
     * The below method invokes the fetchArticles method in Newyork times Repository
     * @return The method will return an array of articles
     * 
     */
    public function fetchNYTimesApiArticles() : array {
        $rawArticles = $this->nyTimesApiRepository->fetchArticles();
        $articles = $this->newsDataFormatterService->formatNYTimesApiData($rawArticles);
        Log::info('New york times api articles received');
        return $articles;
    }

}