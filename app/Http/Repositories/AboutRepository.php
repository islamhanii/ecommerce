<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AboutInterface;
use App\Http\Traits\AboutTrait;
use App\Http\Traits\ImageStorage;
use App\Models\About;

class AboutRepository implements AboutInterface {
    use AboutTrait, ImageStorage;

    private $aboutModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(About $aboutModel) {
        $this->aboutModel = $aboutModel;
    }

    /*-------------------------------------Get All Abouts-----------------------------------*/
    public function index() {
        $abouts = $this->getAbouts();

        return view('admin.abouts.index', compact('abouts'));
    }

    /*-------------------------------------Create About-----------------------------------*/
    public function create() {
        return view('admin.abouts.create');
    }

    public function store($request) {
        $path = $this->uploadImage($request, 'abouts');

        $this->aboutModel->create([
            'image' => $path,
            'description' => $request->description 
        ]);

        session()->flash('success', 'About created successfully');
        return redirect(route('abouts.index'));
    }

    /*-------------------------------------Update About-----------------------------------*/
    public function edit($aboutId) {
        $about = $this->getAboutById($aboutId);

        return view('admin.abouts.edit', compact('about'));
    }

    public function update($request) {
        $about = $this->getAboutById($request->about_id);

        $path = $this->uploadImage($request, 'abouts', $about);

        $about->update([
            'image' => $path,
            'description' => $request->description
        ]);

        session()->flash('success', 'About updated successfully');
        return redirect(route('abouts.index'));
    }

    /*-------------------------------------Delete About-----------------------------------*/
    public function destroy($request) {
        $about = $this->getAboutById($request->about_id);
        
        $about->delete();
        $this->deleteImage($about->image);

        session()->flash('success', 'About deleted successfully');
        return redirect(route('abouts.index'));
    }
}