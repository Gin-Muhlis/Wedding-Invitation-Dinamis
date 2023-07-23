<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRsvpStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'reply' => ['required', 'max:255', 'string'],
            'kehadiran' => ['required', 'in:hadir,tidak hadir'],
            'bg_profile' => ['required', 'max:255', 'string'],
            'rsvp_id' => ['required', 'exists:rsvps,id'],
        ];
    }
}
