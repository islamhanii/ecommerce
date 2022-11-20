<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\AdvertisementTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\SliderTrait;
use App\Http\Traits\SubCategoryTrait;
use App\Models\Advertisement;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;

class HomeRepository implements HomeInterface {
    use SliderTrait, AdvertisementTrait, SubCategoryTrait, ProductTrait;

    private $sliderModel;
    private $advertisementModel;
    private $subCategoryModel;
    private $productModel;

    public function __construct(Slider $sliderModel, Advertisement $advertisementModel, SubCategory $subCategoryModel, Product $productModel) {
        $this->sliderModel = $sliderModel;
        $this->advertisementModel = $advertisementModel;
        $this->subCategoryModel = $subCategoryModel;
        $this->productModel = $productModel;
    }

    public function index() {
        $sliders = $this->getSlidersInRandom(5);
        $advertisements = $this->getAdvertisementsInRandom(2);
        $subCategories = $this->getSubCategoriesInRandom(10);
        $products = $this->getProductsInRandom(10)->append('name');

        return view('endUser.index', compact('sliders', 'advertisements', 'subCategories', 'products'));
    }
}