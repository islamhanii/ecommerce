<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PolicyCategoryInterface;
use App\Http\Requests\PolicyCategories\AddPolicyCategoryRequest;
use App\Http\Requests\PolicyCategories\DeletePolicyCategoryRequest;
use App\Http\Requests\PolicyCategories\UpdatePolicyCategoryRequest;

class PolicyCategoryController extends Controller
{
    private $policyCategoryInterface;

    public function __construct(PolicyCategoryInterface $policyCategoryInterface) {
        $this->policyCategoryInterface = $policyCategoryInterface;
    }

    public function index() {
        return $this->policyCategoryInterface->index();
    }

    public function create() {
        return $this->policyCategoryInterface->create();
    }

    public function store(AddPolicyCategoryRequest $request) {
        return $this->policyCategoryInterface->store($request);
    }

    public function edit($policyCategoryId) {
        return $this->policyCategoryInterface->edit($policyCategoryId);
    }

    public function update(UpdatePolicyCategoryRequest $request) {
        return $this->policyCategoryInterface->update($request);
    }

    public function delete(DeletePolicyCategoryRequest $request) {
        return $this->policyCategoryInterface->destroy($request);
    }
}
