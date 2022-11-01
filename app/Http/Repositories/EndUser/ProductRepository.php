<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ProductInterface;
use App\Http\Traits\ProductTrait;
use App\Models\Product;

class ProductRepository implements ProductInterface {
    use ProductTrait;

    private $productModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(Product $productModel) {
        $this->productModel = $productModel;
    }

    /*-------------------------------------Show Category's Product-----------------------------------*/
    public function subCategoryProducts($subCategoryId, $language) {
        $products = $this->getProductsBySubCategoryId($subCategoryId)->append('name');
        return view('endUser.products', compact('products'));
    }

    /*-------------------------------------Show Product Details-----------------------------------*/
    public function productDetails($productId, $language) {
        $product = $this->getProductById($productId)->append('name', 'sizes');
        return view('endUser.productDetails', compact('product'));
    }
}