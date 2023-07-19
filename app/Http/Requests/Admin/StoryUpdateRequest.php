<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoryUpdateRequest extends FormRequest
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
            'story_image' => ['image', 'max:3096', 'nullable'],
            'story_date' => ['required', 'date'],
            'story_title' => ['nullable', 'max:255', 'string'],
            'content' => ['required', 'string'],
            'order_id' => ['required', 'exists:orders,id'],
        ];
    }
}
