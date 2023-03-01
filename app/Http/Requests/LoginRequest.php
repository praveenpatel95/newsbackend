<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationRequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(){
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:16',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationRequestException($validator->errors());
    }

    public function messages() //Optional
    {
        return [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }
}
