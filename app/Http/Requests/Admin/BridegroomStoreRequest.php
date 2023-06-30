<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BridegroomStoreRequest extends FormRequest
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
            'male_fullname' => ['required', 'max:255', 'string'],
            'male_nickname' => ['required', 'max:255', 'string'],
            'male_mother_name' => ['required', 'max:255', 'string'],
            'male_father_name' => ['required', 'max:255', 'string'],
            'female_fullname' => ['required', 'max:255', 'string'],
            'female_nickname' => ['required', 'max:255', 'string'],
            'female_mother_name' => ['required', 'max:255', 'string'],
            'female_father_name' => ['required', 'max:255', 'string'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
