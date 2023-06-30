<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WeddingReceptionStoreRequest extends FormRequest
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
            'reception_date' => ['required', 'date'],
            'reception_time' => ['required', 'date_format:H:i:s'],
            'reception_place' => ['required', 'max:255', 'string'],
            'reception_address' => ['required', 'max:255', 'string'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
