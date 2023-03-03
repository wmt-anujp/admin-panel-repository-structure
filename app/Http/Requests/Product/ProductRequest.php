<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'pcategory' => 'required',
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'title' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'description' => 'required|max:200',
            'base_price' => 'required|regex:/^[0-9]*$/',
            'disc_price' => 'required|regex:/^[0-9]*$/',
            'product_image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pcategory.required' => 'Please Select Category of Product',
            'name.required' => 'Please Enter Product\'s Name',
            'name.regex' => 'Only alphabets are allowed',
            'name.max' => 'Only 50 characters are allowed',
            'title.required' => 'Please Enter Product\'s Title',
            'title.regex' => 'Only alphabets are allowed',
            'title.max' => 'Only 50 characters are allowed',
            'description.required' => 'Please Enter Product\'s Description',
            'description.max' => 'Only 200 characters are allowed',
            'base_price.required' => 'Please Enter Product\'s Base Price',
            'base_price.regex' => 'Only Numbers are allowed',
            'disc_price.required' => 'Please Enter Product\'s Base Price',
            'disc_price.regex' => 'Only Numbers are allowed',
            'product_image.required' => 'Please Upload Product\'s Images',
            // 'product_image.mimes' => 'Only jpg,jpeg,png,svg formats are allowed'
        ];
    }
}
