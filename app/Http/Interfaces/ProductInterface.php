<?php

namespace App\Http\Interfaces;

interface ProductInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($productId);
    public function update($request);
    public function destroy($request);
    public function uploadPage();
    public function upload($request);
    public function updateUploadPage();
    public function uploadUpdate($request);
    public function scanImages();
}