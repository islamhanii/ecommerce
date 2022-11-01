<?php

namespace App\Http\Traits;

trait ProductDetailsTrait {
    private function getProductDetails($with = []) {
        return $this->productDetailsModel->with($with)->get();
    }

    private function getProductDetailsById($productDetailsId) {
        return $this->productDetailsModel->findOrFail($productDetailsId);
    }

    private function getSizeProductDetailsByProductId($productId, $sizeId) {
        return $this->productDetailsModel->where([
                ['product_id', $productId],
                ['size_id', $sizeId]
        ])->get();
    }
}