<?php

namespace App\Http\Requests\PolicyCategories;

use App\Models\PolicyCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePolicyCategoryRequest extends FormRequest
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
        return array_merge(PolicyCategory::rules(), [
            'policy_category_id' => 'required|exists:policy_categories,id',
        ]);
    }
}
