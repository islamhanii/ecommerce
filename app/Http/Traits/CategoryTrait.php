<?php

namespace App\Http\Traits;

trait CategoryTrait {
    private function getCategories()
    {
        return $this->categoryModel->get();
    }

    private function getCategoryById($categoryId)
    {
        return $this->categoryModel->findOrFail($categoryId);
    }
}