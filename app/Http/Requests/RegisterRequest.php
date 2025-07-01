<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ReqiesterRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }
    public function rules():array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|max255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'confirm_password.required' => 'Confirm Password is required',
            'email.email' => 'Email is not valid',
            'email.unique' => 'Email is already exists',
            'password.min' => 'Password must be at least 8 characters',
            'confirm_password.same' => 'Password and Confirm Password must be same',
        ];
    }

}