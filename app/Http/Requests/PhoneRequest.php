<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
            // mobilephone => name fo the input from the form not from database
            // 'mobilephone' => 'required|unique:phones|numeric|starts_with:010,011,012,015',

            // can separete validators with => | or []
            
            // 'mobilephone' => 'required|unique:phones,mobilephone|regex:/^01[0125][0-9]{8}$/',
            'mobilephone' => ['required', 'unique:phones,mobilephone', 'regex:/^01[0125][0-9]{8}$/'],
        ];
    }

    // messages function to customize error messages
    public function messages()
    {
        return [
            'mobilephone.regex' => 'mobilephone must begin with 010, 011, 012, 015 and be 11 char',
        ];
    }
}
