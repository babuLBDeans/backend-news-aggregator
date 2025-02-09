<?php

namespace App\Providers;

use App\Repositories\NewsAPIRepository as RepositoriesNewsAPIRepository;
use App\Repositories\NewsAPIRepositoryInterface;
use App\Repositories\ServicesInterface;
use App\Services\ArticleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NewsAPIRepositoryInterface::class, RepositoriesNewsAPIRepository::class);
        $this->app->bind(ServicesInterface::class, ArticleService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
