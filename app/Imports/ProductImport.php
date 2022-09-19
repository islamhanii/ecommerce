<?php

namespace App\Imports;

use App\Models\Language;
use App\Models\Product;
use App\Models\ProductName;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = Product::create([
            'code' => $row['code'],
            'description' => $row['description'],
            'price' => $row['price'],
            'sub_category_id' => $row['sub_category_id']
        ]);

        $languages = Language::get();

        foreach($languages as $language) {
            ProductName::create([
                'product_id' => $product->id,
                'language_id' => $language->id,
                'name' => $row['name_' . $language->name]
            ]);
        }

        return null;
    }

    public function rules(): array
    {
        return array_merge(Product::rules(), [
            'image' => ''
        ]);
    }
}