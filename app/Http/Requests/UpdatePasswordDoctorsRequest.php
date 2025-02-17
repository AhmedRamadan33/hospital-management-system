<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordDoctorsRequest extends FormRequest
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
          'password' => [
            'required',
            'string',
            'min:10',             // must be at least 10 characters in length
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[A-Z]/',      // must contain at least one uppercase letter
            'regex:/[0-9]/',      // must contain at least one digit
            'regex:/[@$!%*#?&]/', // must contain a special character
        ],
        'confirmedPassword' => [
            'required',
            'same:password',
        ],


        ];
    }

}
