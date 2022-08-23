<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SubCategoryInterface;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\ImageStorage;
use App\Http\Traits\SubCategoryTrait;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryRepository implements SubCategoryInterface {
    use SubCategoryTrait;
    use CategoryTrait;
    use ImageStorage;

    private $categoryModel;
    private $subCategoryModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(Category $categoryModel, SubCategory $subCategoryModel) {
        $this->categoryModel = $categoryModel;
        $this->subCategoryModel = $subCategoryModel;
    }

    /*-------------------------------------Get All Categories-----------------------------------*/
    
    public function index() {
        $subCategories = $this->getSubCategories();

        return view('admin.sub-categories.index', compact('subCategories'));
    }

    /*-------------------------------------Create Category-----------------------------------*/

    public function create() {
        $categories = $this->getCategories();
        return view('admin.sub-categories.create', compact('categories'));
    }

    public function store($request) {
        $path = $this->uploadImage($request, 'sub-categories');
        $this->subCategoryModel->create([
            'name' => $request->name,
            'image' => $path,
            'category_id' => $request->select
        ]);

        session()->flash('success', 'SubCategory was created successfully.');
        return redirect(route('sub_categories.index'));
    }

    /*-------------------------------------Update Category-----------------------------------*/
    
    public function edit($subCategoryId) {
        $subCategory = $this->getSubCategoryById($subCategoryId);
        $categories = $this->getCategories();
        return view('admin.sub-categories.edit', compact('subCategory', 'categories'));
    }

    public function update($request) {
        $subCategory = $this->getSubCategoryById($request->sub_category_id);

        $path = $this->uploadImage($request, 'sub-categories', $subCategory);

        $subCategory->update([
            'name' => $request->name,
            'image' => $path,
            'category_id' => $request->select
        ]);

        session()->flash('success', 'SubCategory was updated successfully.');
        return redirect(route('sub_categories.index'));
    }

    /*-------------------------------------Delete Category-----------------------------------*/

    public function destroy($request) {
        $subCategory = $this->getSubCategoryById($request->sub_category_id);
        $subCategory->delete();
        $this->deleteImage($subCategory->image);

        session()->flash('success', 'SubCategory was deleted successfully.');
        return redirect(route('sub_categories.index'));
    }
}