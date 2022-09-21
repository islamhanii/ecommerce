<?php

namespace App\Http\Requests\Colors;

use App\Models\Color;
use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
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
        return array_merge(Color::rules(), [
            'color_id' => 'required|exists:colors,id'
        ]);
    }
}
