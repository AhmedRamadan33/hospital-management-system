<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRayEmpRequest extends FormRequest
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
           'description_employee' => 'required|',
            "photos"    => "required|array|min:1",
            "photos.*"  => "required|mimes:png,jpg,jpeg,svg|max:2048",
        ];
    }

}
