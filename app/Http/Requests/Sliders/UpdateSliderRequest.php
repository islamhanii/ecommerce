<?php

namespace App\Http\Requests\Sliders;

use App\Models\Slider;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
        return array_merge(Slider::rules(), [
            'image' => 'mimes:png,jpg,jpeg,webp',
            'slider_id' => 'required|exists:sliders,id'
        ]);
    }
}
