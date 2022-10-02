<?php

namespace App\Http\Traits;

trait PolicyCategoryTrait {
    private function getPolicyCategories()
    {
        return $this->policyCategoryModel->get();
    }

    private function getPolicyCategoryById($policyCategoryId)
    {
        return $this->policyCategoryModel->find($policyCategoryId);
    }
}