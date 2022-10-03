<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SliderInterface;
use App\Http\Traits\ImageStorage;
use App\Http\Traits\SliderTrait;
use App\Models\Slider;

class SliderRepository implements SliderInterface {
    use SliderTrait, ImageStorage;

    private $sliderModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(Slider $sliderModel) {
        $this->sliderModel = $sliderModel;
    }

    /*-------------------------------------Get All Sliders-----------------------------------*/

    public function index() {
        $sliders = $this->getSliders();

        return view('admin.sliders.index', compact('sliders'));
    }

    /*-------------------------------------Create Slider-----------------------------------*/

    public function create() {
        return view('admin.sliders.create');
    }

    public function store($request) {
        $path = $this->uploadImage($request, 'sliders');

        $this->sliderModel->create([
            'image' => $path,
            'title' => $request->title,
            'slug'  => $request->slug,
            'position' => $request->position,
            'link'  => $request->link
        ]);

        session()->flash('success', 'Slider created successfully');
        return redirect(route('sliders.index'));
    }

    /*-------------------------------------Update Slider-----------------------------------*/

    public function edit($sliderId) {
        $slider = $this->getSliderById($sliderId);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update($request) {
        $slider = $this->getSliderById($request->slider_id);

        $path = $this->uploadImage($request, 'sliders', $slider);

        $slider->update([
            'image' => $path,
            'title' => $request->title,
            'slug'  => $request->slug,
            'position' => $request->position,
            'link'  => $request->link
        ]);

        session()->flash('success', 'Slider updated successfully');
        return redirect(route('sliders.index'));
    }

    /*-------------------------------------Update Slider-----------------------------------*/

    public function destroy($request) {
        $slider = $this->getSliderById($request->slider_id);
        
        $slider->delete();
        $this->deleteImage($slider->image);


        session()->flash('success', 'Slider deleted successfully');
        return redirect(route('sliders.index'));
    }
}