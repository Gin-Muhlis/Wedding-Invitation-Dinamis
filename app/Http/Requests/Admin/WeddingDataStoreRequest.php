<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WeddingDataStoreRequest extends FormRequest
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
            'wedding_coordinate' => ['required', 'max:255', 'string'],
            'giff_address' => ['required', 'max:255', 'string'],
            'male_image' => ['image', 'max:3048', 'required'],
            'female_image' => ['image', 'max:3048', 'required'],
            'cover_image' => ['image', 'max:3048', 'required'],
            'music' => ['file', 'max:10124', 'required', 'mimes:mp3'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
