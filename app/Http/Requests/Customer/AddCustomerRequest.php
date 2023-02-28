<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
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
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'mobile' => 'required|regex:/^[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{1,4}$/',
            'email' => 'required|email|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'Please enter first name',
            'fname.max' => 'max 50 characters are allowed',
            'lname.required' => 'Please enter last name',
            'lname.max' => 'max 50 characters are allowed',
            'mobile.required' => 'Please enter mobile number',
            'email.required' => 'Please enter email id',
            'email.email' => 'Please enter valid email id',
        ];
    }
}
