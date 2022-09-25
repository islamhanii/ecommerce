<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductDetailsInterface;
use App\Http\Traits\ColorTrait;
use App\Http\Traits\ImageStorage;
use App\Http\Traits\ProductDetailsTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\SizeTrait;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;

class ProductDetailsRepository implements ProductDetailsInterface {
    use ProductTrait, SizeTrait, ColorTrait, ProductDetailsTrait, ImageStorage;

    private $productModel;
    private $sizeModel;
    private $colorModel;
    private $productDetailsModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(Product $productModel, Size $sizeModel, Color $colorModel, ProductDetail $productDetailsModel) {
        $this->productModel = $productModel;
        $this->sizeModel = $sizeModel;
        $this->colorModel = $colorModel;
        $this->productDetailsModel = $productDetailsModel;
    }

    /*-------------------------------------Get All ProductDetails-----------------------------------*/

    public function index() {
        $productDetails = $this->getProductDetails(['product.product_names', 'size.size_unit']);

        return view('admin.productDetails.index', compact('productDetails'));
    }

    /*-------------------------------------Create Product Details-----------------------------------*/

    public function create() {
        $products = $this->getProducts('product_names');
        $sizes = $this->getSizes();
        $colors = $this->getColors();

        return view('admin.productDetails.create', compact('products', 'sizes', 'colors'));
    }

    public function store($request) {
        $path = $this->uploadImage($request, 'product-details');

        $this->productDetailsModel->create([
            'stock' => $request->stock,
            'image' => $path,
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id
        ]);

        session()->flash('success', 'ProductDetails created successfully.');
        return redirect(route('product.details.index'));
    }

    /*-------------------------------------Update Product Details-----------------------------------*/

    public function edit($productDetailsId) {
        $productDetails = $this->getProductDetailsById($productDetailsId);
        $products = $this->getProducts('product_names');
        $sizes = $this->getSizes();
        $colors = $this->getColors();

        return view('admin.productDetails.edit', compact('productDetails', 'products', 'sizes', 'colors'));
    }

    public function update($request) {
        $productDetails = $this->getProductDetailsById($request->product_details_id);

        $path = $this->uploadImage($request, 'product-details', $productDetails);

        $productDetails->update([
            'stock' => $request->stock,
            'image' => $path,
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id
        ]);

        session()->flash('success', 'ProductDetails updated successfully.');
        return redirect(route('product.details.index'));
    }

    /*-------------------------------------Delete Product Details-----------------------------------*/

    public function destroy($request) {
        $productDetails = $this->getProductDetailsById($request->product_details_id);

        $productDetails->delete();
        $this->deleteImage($productDetails->image);

        session()->flash('success', 'ProductDetails deleted successfully.');
        return redirect(route('product.details.index'));
    }
}