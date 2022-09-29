<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AdvertisementInterface;
use App\Http\Requests\Advertisements\AddAdvertisementRequest;
use App\Http\Requests\Advertisements\DeleteAdvertisementRequest;
use App\Http\Requests\Advertisements\UpdateAdvertisementRequest;

class AdvertisementController extends Controller
{
    private $advertisementInterface;

    public function __construct(AdvertisementInterface $advertisementInterface) {
        $this->advertisementInterface = $advertisementInterface;
    }

    public function index() {
        return $this->advertisementInterface->index();
    }

    public function create() {
        return $this->advertisementInterface->create();
    }

    public function store(AddAdvertisementRequest $request) {
        return $this->advertisementInterface->store($request);
    }

    public function edit($aboutId) {
        return $this->advertisementInterface->edit($aboutId);
    }

    public function update(UpdateAdvertisementRequest $request) {
        return $this->advertisementInterface->update($request);
    }

    public function delete(DeleteAdvertisementRequest $request) {
        return $this->advertisementInterface->destroy($request);
    }
}
