<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ProductInterface;

class ProductController extends Controller
{
    private $productInterface;

    public function __construct(ProductInterface $productInterface) {
        $this->productInterface = $productInterface;
    }

    public function subCategoryProducts($subCategoryId, $language) {
        return $this->productInterface->subCategoryProducts($subCategoryId, $language);
    }
}
