<?php
namespace App\Http\Traits;

trait SubCategoryTrait
{
    private function getSubCategories()
    {
        return $this->subCategoryModel::get();
    }

    private function getSubCategoryById($subCategoryId)
    {
        return $this->subCategoryModel::findOrFail($subCategoryId);
    }
}