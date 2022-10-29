<?php
namespace App\Http\Traits;

trait SubCategoryTrait
{
    private function getSubCategories()
    {
        return $this->subCategoryModel->get();
    }

    private function getSubCategoriesInRandom($limit)
    {
        return $this->subCategoryModel->withCount('products')->inRandomOrder()->limit($limit)->get();
    }

    private function getSubCategoryById($subCategoryId)
    {
        return $this->subCategoryModel->findOrFail($subCategoryId);
    }
}