<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\Products\AddProductRequest;
use App\Http\Requests\Products\DeleteProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Requests\Products\UploadFileProductRequest;

class ProductController extends Controller
{
    private $productInterface;

    public function __construct(ProductInterface $productInterface) {
        $this->productInterface = $productInterface;
    }

    public function index() {
        return $this->productInterface->index();
    }

    public function create() {
        return $this->productInterface->create();
    }

    public function store(AddProductRequest $request) {
        return $this->productInterface->store($request);
    }

    public function edit($productId) {
    return $this->productInterface->edit($productId);
    }

    public function update(UpdateProductRequest $request) {
        return $this->productInterface->update($request);
    }

    public function delete(DeleteProductRequest $request) {
        return $this->productInterface->destroy($request);
    }

    public function uploadPage() {
        return $this->productInterface->uploadPage();
    }

    public function upload(UploadFileProductRequest $request) {
        return $this->productInterface->upload($request);
    }

    public function updateUploadPage() {
        return $this->productInterface->updateUploadPage();
    }

    public function uploadUpdate(UploadFileProductRequest $request) {
        return $this->productInterface->uploadUpdate($request);
    }

    public function scanImages() {
        return $this->productInterface->scanImages();
    }
}
