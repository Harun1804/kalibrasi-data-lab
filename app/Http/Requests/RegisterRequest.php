<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'  => 'required|unique:users,username|min:6',
            'email'     => 'required|unique:users,email|email:dns',
            'nohp'      => 'nullable|numeric',
            'password'  => 'required|min:8|same:cpassword',
            'cpassword'  => 'required|min:8|same:password'
        ];
    }
}
