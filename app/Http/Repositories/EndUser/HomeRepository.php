<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\AdvertisementTrait;
use App\Http\Traits\SliderTrait;
use App\Http\Traits\SubCategoryTrait;
use App\Models\Advertisement;
use App\Models\Slider;
use App\Models\SubCategory;

class HomeRepository implements HomeInterface {
    use SliderTrait, AdvertisementTrait, SubCategoryTrait;

    private $sliderModel;
    private $advertisementModel;
    private $subCategoryModel;

    public function __construct(Slider $sliderModel, Advertisement $advertisementModel, SubCategory $subCategoryModel) {
        $this->sliderModel = $sliderModel;
        $this->advertisementModel = $advertisementModel;
        $this->subCategoryModel = $subCategoryModel;
    }

    public function index() {
        $sliders = $this->getSlidersInRandom(5);
        $advertisements = $this->getAdvertisementsInRandom(2);
        $subCategories = $this->getSubCategoriesInRandom(10);

        return view('endUser.index', compact('sliders', 'advertisements', 'subCategories'));
    }
}