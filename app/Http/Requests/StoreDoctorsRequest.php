<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'name' => 'required|min:3|max:50|string',
            'email' => 'required|unique:doctors,email',
            'password' => ['required','string','min:10','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/', 'regex:/[@$!%*#?&]/', ],
            'phone' => 'required|min:11|unique:doctors,phone',
            'sectionId' => 'required|exists:sections,id',
            'photo' => "mimes:png,jpg,jpeg,svg|max:2048",
            'appointments' => 'required|exists:appointments,id',

        ];
    }

}
