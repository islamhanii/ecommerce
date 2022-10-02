<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PolicyInterface;
use App\Http\Traits\PolicyCategoryTrait;
use App\Http\Traits\PolicyTrait;
use App\Models\Policy;
use App\Models\PolicyCategory;

class PolicyRepository implements PolicyInterface {
    use PolicyTrait, PolicyCategoryTrait;

    private $policyModel, $policyCategoryModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(Policy $policyModel, PolicyCategory $policyCategoryModel) {
        $this->policyModel = $policyModel;
        $this->policyCategoryModel = $policyCategoryModel;
    }

    /*-------------------------------------Get All Policies-----------------------------------*/
    
    public function index() {
        $policies = $this->getPolicies();

        return view('admin.policies.index', compact('policies'));
    }

    /*-------------------------------------Create Policy-----------------------------------*/

    public function create() {
        $policyCategories = $this->getPolicyCategories();
        return view('admin.policies.create', compact('policyCategories'));
    }

    public function store($request) {
        $this->policyModel->create([
            'title' => $request->title,
            'description' => $request->description,
            'policy_category_id' => $request->policy_category_id,
        ]);

        session()->flash('success', 'Policy was created successfully.');
        return redirect(route('policies.index'));
    }

    /*-------------------------------------Update Policy-----------------------------------*/
    
    public function edit($policyId) {
        $policy = $this->getPolicyById($policyId);
        $policyCategories = $this->getPolicyCategories();
        return view('admin.policies.edit', compact('policy', 'policyCategories'));
    }

    public function update($request) {
        $policy = $this->getPolicyById($request->policy_id);
        $policy->update([
            'title' => $request->title,
            'description' => $request->description,
            'policy_category_id' => $request->policy_category_id,
        ]);

        session()->flash('success', 'Policy was updated successfully.');
        return redirect(route('policies.index'));
    }

    /*-------------------------------------Delete Policy-----------------------------------*/

    public function destroy($request) {
        $policy = $this->getPolicyById($request->policy_id);
        $policy->delete();

        session()->flash('success', 'Policy was deleted successfully.');
        return redirect(route('policies.index'));
    }
}