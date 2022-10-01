<?php

namespace App\Http\Traits;

trait CompanyTrait {
    private function getCompanies() {
        return $this->companyModel->get();
    }

    private function getCompanyById($companyId) {
        return $this->companyModel->findOrFail($companyId);
    }
}