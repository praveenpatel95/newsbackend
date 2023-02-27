<?php

namespace App\Providers;

use App\Repository\Article\NewsApi\NewApiInterface;
use App\Repository\Article\NewsApi\NewsAPIRepository;
use App\Repository\Article\NyTimes\NyTimesInterface;
use App\Repository\Article\NyTimes\NyTimesRepository;
use App\Repository\Article\TheGuardian\TheGuardianInterface;
use App\Repository\Article\TheGuardian\TheGuardianRepository;
use App\Repository\Auth\UserInterface;
use App\Repository\Auth\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(NewApiInterface::class, NewsAPIRepository::class);
        $this->app->bind(TheGuardianInterface::class, TheGuardianRepository::class);
        $this->app->bind(NyTimesInterface::class, NyTimesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
