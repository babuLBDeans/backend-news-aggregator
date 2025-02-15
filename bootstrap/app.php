<?php
namespace App\Jobs;
// use App\Jobs\NewsApiFetchArticlesJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withSchedule(function (Schedule $schedule) {
        $newsApiInterval = env('NEWS_API_INTERVAL', 10); // Get interval from .env file
        $guardianApiInterval = env('GUARDIAN_API_INTERVAL', 12);
        $newyorkTimesApiInterval = env('NY_TIMES_INTERVAL', 14);

        $schedule->call(function (){
            $articleService = app(\App\Services\ArticleService::class);
            dispatch(new NewsApiFetchArticlesJob($articleService));
        })->everyMinute($newsApiInterval);

        $schedule->call(function (){
            $articleService = app(\App\Services\ArticleService::class);
            dispatch(new GuardianApiFetchArticlesJob($articleService));
        })->everyMinute($guardianApiInterval);

        $schedule->call(function (){
            $articleService = app(\App\Services\ArticleService::class);
            dispatch(new NYTimesApiFetchArticlesJob($articleService));
        })->everyMinute($newyorkTimesApiInterval);

    })
    ->create();
