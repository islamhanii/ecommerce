<?php

namespace App\Http\Traits;

trait ProductTrait {
    private function getProducts()
    {
        return $this->productModel::get();
    }

    private function getProductById($productId)
    {
        return $this->productModel::findOrFail($productId);
    }
}