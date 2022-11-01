<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\ApiProductDetailsInterface;

class ApiProductDetailsController extends Controller
{
    private $ApiProductDetailsInterface;

    public function __construct(ApiProductDetailsInterface $ApiProductDetailsInterface) {
        $this->ApiProductDetailsInterface = $ApiProductDetailsInterface;
    }

    public function sizeProductDetails($productId, $sizeId) {
        return $this->ApiProductDetailsInterface->sizeProductDetails($productId, $sizeId);
    }
}
