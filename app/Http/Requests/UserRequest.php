<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationRequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|max:16|confirmed',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationRequestException($validator->errors());
    }

    public function messages() //Optional
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address.',
            'password.required' => 'Password is required',
        ];
    }
}
