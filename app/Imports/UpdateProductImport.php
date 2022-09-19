<?php

namespace App\Imports;

use App\Models\Language;
use App\Models\Product;
use App\Models\ProductName;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Validators\ValidationException as ExcelValidator;
use Illuminate\Validation\ValidationException as MainValidator;

class UpdateProductImport implements ToModel, WithHeadingRow, WithValidation
{
    private $row_number = 1;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $this->row_number++;

        $product = Product::where('code', $row['code'])->first();
        if($product) {
            $product->update([
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
        }
        else {
            $this->fail('code', ['code' => 'the product not founded'], $row);
        }

        return null;
    }

    public function rules(): array
    {
        return array_merge(Product::rules(), [
            'image' => '',
            'code' => 'required'
        ]);
    }

    public function fail($key, $error, $row) {
        $failures[] = new Failure($this->row_number, $key, $error, $row);
        throw new ExcelValidator(
            MainValidator::withMessages($error),
            $failures
        );
    }
}
