<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoryStoreRequest extends FormRequest
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
            'story_date' => ['required', 'date'],
            'story_image' => ['nullable', 'max:255', 'string'],
            'story_title' => ['nullable', 'max:255', 'string'],
            'content' => ['required', 'string'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
