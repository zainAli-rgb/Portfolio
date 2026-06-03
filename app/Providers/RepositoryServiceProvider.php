<?php

namespace App\Providers;

use App\Repositories\Interfaces\AuthInterface;
use App\Repositories\Interfaces\SteakyInterfaces;
use App\Repositories\Repos\AuthRepo;
use App\Repositories\Repos\SteakyRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthInterface::class,
            AuthRepo::class
        );

        $this->app->bind(
            SteakyInterfaces::class,
            SteakyRepo::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
