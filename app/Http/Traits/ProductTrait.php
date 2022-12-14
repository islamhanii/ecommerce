<?php

namespace App\Http\Traits;

trait ProductTrait {
    private function getProducts($with = []) {
        return $this->productModel->with($with)->get();
    }

    private function getProductsBySubCategoryId($subCategoryId, $with = []) {
        return $this->productModel->where('sub_category_id', $subCategoryId)->with($with)->get();
    }
    
    private function getProductById($productId, $with = []) {
        return $this->productModel->with($with)->findOrFail($productId);
    }

    private function getProductsInRandom($limit) {
        return $this->productModel->inRandomOrder()->limit($limit)->get();
    }

    private function getProductByCode($productCode) {
        return $this->productModel->where('code', $productCode)->first();
    }
}