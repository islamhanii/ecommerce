<?php

namespace App\Http\Requests\WishLists;

use Illuminate\Foundation\Http\FormRequest;

class DeleteWishListRequest extends FormRequest
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
            'wish_list_id' => 'required|exists:wish_lists,id'
        ];
    }
}
