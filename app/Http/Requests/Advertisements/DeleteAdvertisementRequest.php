<?php

namespace App\Http\Requests\Advertisements;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAdvertisementRequest extends FormRequest
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
            'advertisement_id' => 'required|exists:advertisements,id',
        ];
    }
}
