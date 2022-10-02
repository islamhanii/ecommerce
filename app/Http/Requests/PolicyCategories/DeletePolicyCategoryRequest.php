<?php

namespace App\Http\Requests\PolicyCategories;

use Illuminate\Foundation\Http\FormRequest;

class DeletePolicyCategoryRequest extends FormRequest
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
            'policy_category_id' => 'required|exists:policy_categories,id',
        ];
    }
}
