<?php

namespace App\Http\Traits;

trait ProductTrait {
    private function getProducts($with = []) {
        return $this->productModel->with($with)->get();
    }
    
    private function getProductById($productId, $with = []) {
        return $this->productModel->with($with)->findOrFail($productId);
    }

    private function getProductByCode($productCode) {
        return $this->productModel->where('code', $productCode)->first();
    }
}