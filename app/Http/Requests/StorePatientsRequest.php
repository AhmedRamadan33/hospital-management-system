<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientsRequest extends FormRequest
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
            'email' => 'required|unique:patients,email',
            'password' => ['required', 'string', 'min:10','regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/',],
            'address' => 'required|min:3|max:255',
            'phone' => 'required|min:11|unique:patients,phone',
            'age' => 'required|numeric|',
            'gender' => 'required|in:male,female',
            'blood_group' => 'required|in:O-,O+,A+,A-,B+,B-,AB+,AB-',

        ];
    }
}
