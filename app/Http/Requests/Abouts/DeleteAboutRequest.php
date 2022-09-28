<?php

namespace App\Http\Requests\Abouts;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAboutRequest extends FormRequest
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
            'about_id' => 'required|exists:abouts,id',
        ];
    }
}
