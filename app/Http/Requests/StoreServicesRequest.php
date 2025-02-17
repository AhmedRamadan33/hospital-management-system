<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreServicesRequest extends FormRequest
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
           'name' => 'required|min:3|max:255|',
           'price' => 'required|numeric|gt:0',
           'description' => 'max:255|',
           'sectionId' => 'required|numeric|exists:sections,id',
        ];
    }

}
