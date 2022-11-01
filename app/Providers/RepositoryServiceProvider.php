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
        /*-------------------------------------Bind Authentication-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\AuthInterface::class,
            \App\Http\Repositories\AuthRepository::class
        );

        /*-------------------------------------Bind Home-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\EndUser\HomeInterface::class,
            \App\Http\Repositories\EndUser\HomeRepository::class
        );

        /*-------------------------------------Bind Category-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\CategoryInterface::class,
            \App\Http\Repositories\CategoryRepository::class
        );

        /*-------------------------------------Bind SubCategory-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\SubCategoryInterface::class,
            \App\Http\Repositories\SubCategoryRepository::class
        );

        /*-------------------------------------Bind Product-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\ProductInterface::class,
            \App\Http\Repositories\ProductRepository::class
        );

        /*-------------------------------------Bind Size Units-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\SizeUnitsInterface::class,
            \App\Http\Repositories\SizeUnitsRepository::class
        );

        /*-------------------------------------Bind Size-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\SizeInterface::class,
            \App\Http\Repositories\SizeRepository::class
        );

        /*-------------------------------------Bind Color-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\ColorInterface::class,
            \App\Http\Repositories\ColorRepository::class
        );

        /*-------------------------------------Bind Product Details-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\ProductDetailsInterface::class,
            \App\Http\Repositories\ProductDetailsRepository::class
        );

        /*-------------------------------------Bind Slider-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\SliderInterface::class,
            \App\Http\Repositories\SliderRepository::class
        );

        /*-------------------------------------Bind About-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\AboutInterface::class,
            \App\Http\Repositories\AboutRepository::class
        );

        /*-------------------------------------Bind Advertisement-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\AdvertisementInterface::class,
            \App\Http\Repositories\AdvertisementRepository::class
        );

        /*-------------------------------------Bind Company-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\CompanyInterface::class,
            \App\Http\Repositories\CompanyRepository::class
        );

        /*-------------------------------------Bind Detail-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\DetailInterface::class,
            \App\Http\Repositories\DetailRepository::class
        );

        /*-------------------------------------Bind Policy Category-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\PolicyCategoryInterface::class,
            \App\Http\Repositories\PolicyCategoryRepository::class
        );

        /*-------------------------------------Bind Category-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\PolicyInterface::class,
            \App\Http\Repositories\PolicyRepository::class
        );

        /*-------------------------------------Bind EndUser Product-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\EndUser\ProductInterface::class,
            \App\Http\Repositories\EndUser\ProductRepository::class
        );

        /*------------------------------------------------------------------------------------------------------------------*/
        /*------------------------------------------------------------------------------------------------------------------*/
        /*------------------------------------------------------------------------------------------------------------------*/

        /*-------------------------------------Bind Api Product Details-----------------------------------*/
        $this->app->bind(
            \App\Http\Interfaces\Api\ApiProductDetailsInterface::class,
            \App\Http\Repositories\Api\ApiProductDetailsRepository::class
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
