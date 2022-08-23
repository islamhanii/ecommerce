<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SubCategoryInterface;
use App\Http\Requests\SubCategories\AddSubCategoryRequest;
use App\Http\Requests\SubCategories\DeleteSubCategoryRequest;
use App\Http\Requests\SubCategories\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(SubCategoryInterface $categoryInterface) {
        $this->categoryInterface = $categoryInterface;
    }

    public function index() {
        return $this->categoryInterface->index();
    }

    public function create() {
        return $this->categoryInterface->create();
    }

    public function store(AddSubCategoryRequest $request) {
        return $this->categoryInterface->store($request);
    }

    public function edit($categoryId) {
        return $this->categoryInterface->edit($categoryId);
    }

    public function update(UpdateSubCategoryRequest $request) {
        return $this->categoryInterface->update($request);
    }

    public function delete(DeleteSubCategoryRequest $request) {
        return $this->categoryInterface->destroy($request);
    }
}
