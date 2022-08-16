<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Http\Interfaces\AuthInterface::class,
            \App\Http\Repositories\AuthRepository::class
        );

        $this->app->bind(
            \App\Http\Interfaces\HomeInterface::class,
            \App\Http\Repositories\HomeRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
