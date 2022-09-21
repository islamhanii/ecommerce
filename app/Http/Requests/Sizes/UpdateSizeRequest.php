<?php

namespace App\Http\Requests\Sizes;

use App\Models\Size;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
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
        return array_merge(Size::rules(), [
            'size_id' => 'required|exists:sizes,id'
        ]);
    }
}
