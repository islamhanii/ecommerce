<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Http\Traits\ImageStorage;
use App\Http\Traits\LanguageTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\SubCategoryTrait;
use App\Imports\ProductImport;
use App\Imports\UpdateProductImport;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductName;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductRepository implements ProductInterface {
    use ImageStorage, ProductTrait, LanguageTrait, SubCategoryTrait;

    private $productModel;
    private $languageModel;
    private $productNameModel;
    private $subCategoryModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(Product $productModel, Language $languageModel, ProductName $productNameModel, SubCategory $subCategoryModel) {
        $this->productModel = $productModel;
        $this->languageModel = $languageModel;
        $this->productNameModel = $productNameModel;
        $this->subCategoryModel = $subCategoryModel;
    }

    /*-------------------------------------Get All Products-----------------------------------*/

    public function index() {
        $products = $this->getProducts();

        return view('admin.products.index', compact('products'));
    }

    /*-------------------------------------Create Product-----------------------------------*/

    public function create() {
        $subcategories = $this->getSubCategories();
        return view('admin.products.create', compact('subcategories'));
    }
    
    public function store($request) {
        $path = $this->uploadImage($request, 'products');

        $product = $this->productModel->create([
            "code" => $request->code,
            'description' => $request->description,
            'price' => $request->price,
            'main_image' => $path,
            'sub_category_id' => $request->sub_category_id,
        ]);

        $languages = $this->getLanguages();

        foreach($languages as $language) {
            $value = 'name_' . $language->name;
            $this->productNameModel->create([
                'product_id' => $product->id,
                'language_id' => $language->id,
                'name' => $request->$value
            ]);
        }

        session()->flash('success', 'Product created successfully.');
        return redirect(route('products.index'));
    }

    /*-------------------------------------Update Product-----------------------------------*/

    public function edit($productId) {
        $product = $this->getProductById($productId, 'product_names');
        $subcategories = $this->getSubCategories();
        
        return view('admin.products.edit', compact('subcategories', 'product'));
    }

    public function update($request) {
        $product = $this->getProductById($request->product_id);
        $path = $this->uploadImage($request, 'products', $product, 'main_image');
        
        $product->update([
            'code' => $request->code,
            'description' => $request->description,
            'main_image' => $path,
            'price' => $request->price,
            'sub_category_id' => $request->sub_category_id
        ]);
        
        $languages = $this->getLanguages();

        foreach($languages as $language) {
            $value = 'name_' . $language->name;
            $this->productNameModel->update([
                'product_id' => $product->id,
                'language_id' => $language->id,
                'name' => $request->$value
            ]);
        }

        session()->flash('success', 'Product updated successfully.');
        return redirect(route('products.index'));
    }

    /*-------------------------------------Delete Product-----------------------------------*/

    public function destroy($request) {
        $product = $this->getProductById($request->product_id);
        $product->delete();
        $this->deleteImage($product->main_image);

        session()->flash('success', 'Product deleted successfully.');
        return redirect(route('products.index'));
    }

    /*-------------------------------------Upload Product-----------------------------------*/

    public function uploadPage() {
        return view('admin.products.upload');
    }

    public function upload($request) {
        Excel::import(new ProductImport, $request->file('file'));

        session()->flash('success', 'Products uploaded successfully.');
        return redirect(route('products.index'));
    }

    /*-------------------------------------Upload Update Product-----------------------------------*/

    public function updateUploadPage() {
        return view('admin.products.update-upload');
    }

    public function uploadUpdate($request) {
        Excel::import(new UpdateProductImport, $request->file('file'));

        session()->flash('success', 'Products uploaded successfully.');
        return redirect(route('products.index'));
    }

    /*-------------------------------------Upload Update Product-----------------------------------*/

    public function scanImages() {
        $result = Artisan::call('scan:images');
        if($result === 1) {
            session()->flash('error', 'Please check images\' types (jpg, jpeg, png, webp) Or products code.');
            return redirect(route('products.updatePage'));
        }

        session()->flash('success', 'Images scanned successfully.');
        return redirect(route('products.index'));
    }
}