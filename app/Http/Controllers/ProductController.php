<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\Products\AddProductRequest;

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
}
