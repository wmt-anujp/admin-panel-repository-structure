<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        $rules['fname'] = 'required|max:50';
        $rules['lname'] = 'required|max:50';
        $rules['mobile'] = 'required|regex:/^[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{1,4}$/';
        $rules['email'] = 'required|email|unique:users';
        if (!Auth::user()) {
            $rules['password'] = 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/|max:16';
            $rules['cpassword'] = 'required|same:password';
        }
        return $rules;
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
            'email.unique' => 'Email already taken',
            'password.required' => 'Please enter password',
            'password.regex' => 'Password must contain lower,upper,numbers,special characters and should be at least 8 characters long',
            'password.max' => 'Max 16 characters are allowed',
            'cpassword.required' => 'Please Confirm Your Password',
            'cpassword.same' => 'Confirm Password should be same as password',
        ];
    }
}
