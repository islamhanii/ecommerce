<?php

namespace App\Http\Requests\Advertisements;

use App\Models\Advertisement;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertisementRequest extends FormRequest
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
        return array_merge(Advertisement::rules(), [
            'advertisement_id' => 'required|exists:advertisements,id',
            'image' => 'mimes:png,jpg,jpeg,webp'
        ]);
    }
}
