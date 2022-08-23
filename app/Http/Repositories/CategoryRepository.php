<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Traits\CategoryTrait;
use App\Models\Category;

class CategoryRepository implements CategoryInterface {
    use CategoryTrait;

    private $categoryModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(Category $categoryModel) {
        $this->categoryModel = $categoryModel;
    }

    /*-------------------------------------Get All Categories-----------------------------------*/
    
    public function index() {
        $categories = $this->getCategories();

        return view('admin.categories.index', compact('categories'));
    }

    /*-------------------------------------Create Category-----------------------------------*/

    public function create() {
        return view('admin.categories.create');
    }

    public function store($request) {
        $this->categoryModel->create([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Category was created successfully.');
        return redirect(route('categories.index'));
    }

    /*-------------------------------------Update Category-----------------------------------*/
    
    public function edit($categoryId) {
        $edit = $this->getCategoryById($categoryId);
        return view('admin.categories.edit', compact('edit'));
    }

    public function update($request) {
        $category = $this->getCategoryById($request->category_id);
        $category->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Category was updated successfully.');
        return redirect(route('categories.index'));
    }

    /*-------------------------------------Delete Category-----------------------------------*/

    public function destroy($request) {
        $category = $this->getCategoryById($request->category_id);
        $category->delete();

        session()->flash('success', 'Category was deleted successfully.');
        return redirect(route('categories.index'));
    }
}