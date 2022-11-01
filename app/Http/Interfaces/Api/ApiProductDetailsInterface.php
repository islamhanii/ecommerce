<?php

namespace App\Http\Interfaces\Api;

interface ApiProductDetailsInterface {
    public function sizeProductDetails($productId, $sizeId);
}