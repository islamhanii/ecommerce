<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductDetailsInterface;
use App\Http\Requests\ProductDetails\AddProductDetailsRequest;
use App\Http\Requests\ProductDetails\DeleteProductDetailsRequest;
use App\Http\Requests\ProductDetails\UpdateProductDetailsRequest;

class ProductDetailsController extends Controller
{
    private $productDetailsInterface;

    public function __construct(ProductDetailsInterface $productDetailsInterface) {
        $this->productDetailsInterface = $productDetailsInterface;
    }

    public function index() {
        return $this->productDetailsInterface->index();
    }

    public function create() {
        return $this->productDetailsInterface->create();
    }

    public function store(AddProductDetailsRequest $request) {
        return $this->productDetailsInterface->store($request);
    }

    public function edit($productDetailsId) {
        return $this->productDetailsInterface->edit($productDetailsId);
    }

    public function update(UpdateProductDetailsRequest $request) {
        return $this->productDetailsInterface->update($request);
    }

    public function delete(DeleteProductDetailsRequest $request) {
        return $this->productDetailsInterface->destroy($request);
    }
}
