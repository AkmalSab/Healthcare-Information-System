<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceStoreRequest extends FormRequest
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
            'patient_id' => ['required'],
            'name' => ['required'],            
            'phone' => ['required'],            
            'country' => ['required'],            
            'address_1' => ['required'],
            'address_2' => ['required'],
            'state' => ['required'],
            'postcode' => ['required'],
            'city' => ['required'],
        ];
    }
}