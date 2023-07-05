<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteUpdateRequest extends FormRequest
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
            'website_name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'whatsapp_number' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'link_instagram' => ['required', 'max:255', 'string'],
            'link_fb' => ['required', 'max:255', 'string'],
            'link_twitter' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'website_logo' => ['image', 'max:1024', 'required'],
        ];
    }
}
