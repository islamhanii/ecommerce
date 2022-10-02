<?php

namespace App\Http\Traits;

trait PolicyTrait {
    private function getPolicies()
    {
        return $this->policyModel->get();
    }

    private function getPolicyById($policyId)
    {
        return $this->policyModel->find($policyId);
    }
}