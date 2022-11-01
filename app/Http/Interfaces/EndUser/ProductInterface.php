<?php

namespace App\Http\Interfaces\EndUser;

interface ProductInterface {
    public function subCategoryProducts($subCategoryId, $language);
    public function productDetails($productId, $language);
}