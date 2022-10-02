<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PolicyInterface;
use App\Http\Requests\Policies\AddPolicyRequest;
use App\Http\Requests\Policies\DeletePolicyRequest;
use App\Http\Requests\Policies\UpdatePolicyRequest;

class PolicyController extends Controller
{
    private $policyInterface;

    public function __construct(PolicyInterface $policyInterface) {
        $this->policyInterface = $policyInterface;
    }

    public function index() {
        return $this->policyInterface->index();
    }

    public function create() {
        return $this->policyInterface->create();
    }

    public function store(AddPolicyRequest $request) {
        return $this->policyInterface->store($request);
    }

    public function edit($policyId) {
        return $this->policyInterface->edit($policyId);
    }

    public function update(UpdatePolicyRequest $request) {
        return $this->policyInterface->update($request);
    }

    public function delete(DeletePolicyRequest $request) {
        return $this->policyInterface->destroy($request);
    }
}
