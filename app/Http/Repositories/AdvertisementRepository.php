<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AdvertisementInterface;
use App\Http\Traits\AdvertisementTrait;
use App\Http\Traits\ImageStorage;
use App\Models\Advertisement;

class AdvertisementRepository implements AdvertisementInterface {
    use AdvertisementTrait, ImageStorage;

    private $advertisementModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(Advertisement $advertisementModel) {
        $this->advertisementModel = $advertisementModel;
    }

    /*-------------------------------------Get All Advertisements-----------------------------------*/
    public function index() {
        $advertisements = $this->getAdvertisements();

        return view('admin.advertisements.index', compact('advertisements'));
    }

    /*-------------------------------------Create Advertisement-----------------------------------*/
    public function create() {
        return view('admin.advertisements.create');
    }

    public function store($request) {
        $path = $this->uploadImage($request, 'advertisements');
        
        $this->advertisementModel->create([
            'image' => $path,
            'title' => $request->title,
            'link'  => $request->link
        ]);

        session()->flash('success', 'Advertisement created successfully');
        return redirect(route('advertisements.index'));
    }

    /*-------------------------------------Update Advertisement-----------------------------------*/
    public function edit($advertisementId) {
        $advertisement = $this->getAdvertisementById($advertisementId);

        return view('admin.advertisements.edit', compact('advertisement'));
    }

    public function update($request) {
        $advertisement = $this->getAdvertisementById($request->advertisement_id);

        $path = $this->uploadImage($request, 'advertisements', $advertisement);
        
        $advertisement->update([
            'image' => $path,
            'title' => $request->title,
            'link'  => $request->link
        ]);

        session()->flash('success', 'Advertisement updated successfully');
        return redirect(route('advertisements.index'));
    }

    /*-------------------------------------Delete Advertisement-----------------------------------*/
    public function destroy($request) {
        $advertisement = $this->getAdvertisementById($request->advertisement_id);
        
        $advertisement->delete();
        $this->deleteImage($advertisement->image);

        session()->flash('success', 'Advertisement deleted successfully');
        return redirect(route('advertisements.index'));
    }
}