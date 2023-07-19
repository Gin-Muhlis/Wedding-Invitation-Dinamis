<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WeddingCeremonyUpdateRequest extends FormRequest
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
            'ceremony_date' => ['required', 'date'],
            'ceremony_time' => ['required', 'date_format:H:i:s'],
            'ceremony_address' => ['required', 'max:255', 'string'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
