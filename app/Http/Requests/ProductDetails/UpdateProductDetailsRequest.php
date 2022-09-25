<?php

namespace App\Http\Requests\ProductDetails;

use App\Models\ProductDetail;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(ProductDetail::rules(), [
            'product_details_id' => 'required|exists:product_details,id',
            'image' => 'mimes:png,jpg,jpeg,webp',
        ]);
    }
}
