<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GiftUpdateRequest extends FormRequest
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
            'owner_name' => ['required', 'max:255', 'string'],
            'no_data' => ['required', 'max:255'],
            'gift_payment_id' => ['required', 'exists:gift_payments,id'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
