<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WeddingDataUpdateRequest extends FormRequest
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
            'male_image' => ['image', 'max:1024', 'required'],
            'female_image' => ['image', 'max:1024', 'required'],
            'wedding_coordinate' => ['required', 'max:255', 'string'],
            'greeting' => ['required', 'max:255', 'string'],
            'music' => ['required', 'max:255', 'string'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
