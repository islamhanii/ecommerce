<?php

namespace App\Http\Traits;

trait ProductDetailsTrait {
    private function getProductDetails($with = []) {
        return $this->productDetailsModel->with($with)->get();
    }

    private function getProductDetailsById($productDetailsId) {
        return $this->productDetailsModel->findOrFail($productDetailsId);
    }
}