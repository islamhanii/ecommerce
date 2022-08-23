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
            \App\Http\Interfaces\EndUser\HomeInterface::class,
            \App\Http\Repositories\EndUser\HomeRepository::class
        );

        $this->app->bind(
            \App\Http\Interfaces\CategoryInterface::class,
            \App\Http\Repositories\CategoryRepository::class
        );

        $this->app->bind(
            \App\Http\Interfaces\SubCategoryInterface::class,
            \App\Http\Repositories\SubCategoryRepository::class
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
