<?php

namespace App\Http\Interfaces;

interface AdvertisementInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($advertisementId);
    public function update($request);
    public function destroy($request);
}