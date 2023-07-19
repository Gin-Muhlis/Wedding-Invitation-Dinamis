<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'no_order' => ['required', 'max:255', 'string'],
            'order_date' => ['required', 'date'],
            'domain' => ['required', 'max:255', 'string'],
            'total_order' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
            'theme_id' => ['required', 'exists:themes,id'],
            'status' => [
                'required',
                'in:aktif,kadaluwarsa,menunggu pembayaran',
            ],
        ];
    }
}
