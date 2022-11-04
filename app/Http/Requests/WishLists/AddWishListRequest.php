<?php

namespace App\Http\Requests\WishLists;

use Illuminate\Foundation\Http\FormRequest;

class AddWishListRequest extends FormRequest
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
        return [
            'user_id' => 'required|exists:users,id',
            'product_details_id' => 'required|exists:product_details,id'
        ];
    }
}
