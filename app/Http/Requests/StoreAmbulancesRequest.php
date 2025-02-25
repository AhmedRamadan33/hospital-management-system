<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAmbulancesRequest extends FormRequest
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
            'car_number' => 'required|unique:ambulances,car_number',
            'car_model' => 'required|min:3|max:255|string',
            'car_year_made' => 'required|numeric|',
            'car_type' => 'required|numeric|in:1,2',
        ];
    }
}
