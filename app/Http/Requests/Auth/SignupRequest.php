<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/|max:16',
            'cpassword' => 'required|same:password',
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
            'password.required' => 'Please enter password',
            'password.regex' => 'Password must contain lower,upper,numbers,special characters and should be at least 8 characters long',
            'password.max' => 'Max 16 characters are allowed',
            'cpassword.required' => 'Please Confirm Your Password',
            'cpassword.same' => 'Confirm Password should be same as password',
        ];
    }
}
