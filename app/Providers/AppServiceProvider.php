<?php

namespace App\Providers;

use App\Repositories\GuardianAPIRepostory;
use App\Repositories\GuardianAPIRepostoryInterface;
use App\Repositories\NewsAPIRepository as RepositoriesNewsAPIRepository;
use App\Repositories\NewsAPIRepositoryInterface;
use App\Repositories\NewyorkTimesAPIRepostory;
use App\Repositories\NewyorkTimesAPIRepostoryInterface;
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
        $this->app->bind(GuardianAPIRepostoryInterface::class, GuardianAPIRepostory::class);
        $this->app->bind(NewyorkTimesAPIRepostoryInterface::class, NewyorkTimesAPIRepostory::class);

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
