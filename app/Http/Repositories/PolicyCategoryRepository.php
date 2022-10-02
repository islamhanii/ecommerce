<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PolicyCategoryInterface;
use App\Http\Traits\PolicyCategoryTrait;
use App\Models\PolicyCategory;

class PolicyCategoryRepository implements PolicyCategoryInterface {
    use PolicyCategoryTrait;

    private $policyCategoryModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(PolicyCategory $policyCategoryModel) {
        $this->policyCategoryModel = $policyCategoryModel;
    }

    /*-------------------------------------Get All Categories-----------------------------------*/
    
    public function index() {
        $policyCategories = $this->getPolicyCategories();

        return view('admin.policy-categories.index', compact('policyCategories'));
    }

    /*-------------------------------------Create Category-----------------------------------*/

    public function create() {
        return view('admin.policy-categories.create');
    }

    public function store($request) {
        $this->policyCategoryModel->create([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Policy Category was created successfully.');
        return redirect(route('policy.categories.index'));
    }

    /*-------------------------------------Update Category-----------------------------------*/
    
    public function edit($policyCategoryId) {
        $policyCategory = $this->getPolicyCategoryById($policyCategoryId);
        return view('admin.policy-categories.edit', compact('policyCategory'));
    }

    public function update($request) {
        $policyCategory = $this->getPolicyCategoryById($request->policy_category_id);
        $policyCategory->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Policy Category was updated successfully.');
        return redirect(route('policy.categories.index'));
    }

    /*-------------------------------------Delete Category-----------------------------------*/

    public function destroy($request) {
        $policyCategory = $this->getPolicyCategoryById($request->policy_category_id);
        $policyCategory->delete();

        session()->flash('success', 'Policy Category was deleted successfully.');
        return redirect(route('policy.categories.index'));
    }
}