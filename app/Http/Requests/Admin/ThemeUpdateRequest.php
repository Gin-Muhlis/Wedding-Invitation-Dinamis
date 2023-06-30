<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ThemeUpdateRequest extends FormRequest
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
            'theme_name' => ['required', 'max:255', 'string'],
            'theme_code' => ['required', 'max:255', 'string'],
            'catgory_id' => ['required', 'exists:catgories,id'],
            'type' => ['required', 'in:pakai foto,tanpa foto'],
        ];
    }
}
