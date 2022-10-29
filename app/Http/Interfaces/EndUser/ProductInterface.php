<?php

namespace App\Http\Interfaces\EndUser;

interface ProductInterface {
    public function subCategoryProducts($subCategoryId, $language);
}