<?php

namespace App\Http\Requests\Abouts;

use App\Models\About;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
        return array_merge(About::rules(), [
            'about_id' => 'required|exists:abouts,id',
            'image' => 'mimes:png,jpg,jpeg,webp'
        ]);
    }
}
