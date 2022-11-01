<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\ApiProductDetailsInterface;
use App\Http\Resources\ProductDetailsResource;
use App\Http\Traits\ProductDetailsTrait;
use App\Models\ProductDetail;

class ApiProductDetailsRepository implements ApiProductDetailsInterface {
    use ProductDetailsTrait;
    private $productDetailsModel;

    public function __construct(ProductDetail $productDetailsModel) {
        $this->productDetailsModel = $productDetailsModel;
    }

    public function sizeProductDetails($productId, $sizeId) {
        $productDetails = $this->getSizeProductDetailsByProductId($productId, $sizeId);
        return ProductDetailsResource::collection($productDetails);
    }
}