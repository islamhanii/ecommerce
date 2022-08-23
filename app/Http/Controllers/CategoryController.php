<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\Categories\AddCategoryRequest;
use App\Http\Requests\Categories\DeleteCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface) {
        $this->categoryInterface = $categoryInterface;
    }

    public function index() {
        return $this->categoryInterface->index();
    }

    public function create() {
        return $this->categoryInterface->create();
    }

    public function store(AddCategoryRequest $request) {
        return $this->categoryInterface->store($request);
    }

    public function edit($categoryId) {
        return $this->categoryInterface->edit($categoryId);
    }

    public function update(UpdateCategoryRequest $request) {
        return $this->categoryInterface->update($request);
    }

    public function delete(DeleteCategoryRequest $request) {
        return $this->categoryInterface->destroy($request);
    }
}
