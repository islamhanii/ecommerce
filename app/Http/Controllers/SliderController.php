<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SliderInterface;
use App\Http\Requests\Sliders\AddSliderRequest;
use App\Http\Requests\Sliders\DeleteSliderRequest;
use App\Http\Requests\Sliders\UpdateSliderRequest;

class SliderController extends Controller
{
    private $sliderInterface;

    public function __construct(SliderInterface $sliderInterface) {
        $this->sliderInterface = $sliderInterface;
    }

    public function index() {
        return $this->sliderInterface->index();
    }

    public function create() {
        return $this->sliderInterface->create();
    }

    public function store(AddSliderRequest $request) {
        return $this->sliderInterface->store($request);
    }

    public function edit($sliderId) {
        return $this->sliderInterface->edit($sliderId);
    }

    public function update(UpdateSliderRequest $request) {
        return $this->sliderInterface->update($request);
    }
    public function delete(DeleteSliderRequest $request) {
        return $this->sliderInterface->destroy($request);
    }
}
