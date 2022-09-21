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

        $this->app->bind(
            \App\Http\Interfaces\ProductInterface::class,
            \App\Http\Repositories\ProductRepository::class
        );

        $this->app->bind(
            \App\Http\Interfaces\SizeUnitsInterface::class,
            \App\Http\Repositories\SizeUnitsRepository::class
        );

        $this->app->bind(
            \App\Http\Interfaces\ColorInterface::class,
            \App\Http\Repositories\ColorRepository::class
        );

        $this->app->bind(
            \App\Http\Interfaces\SizeInterface::class,
            \App\Http\Repositories\SizeRepository::class
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
