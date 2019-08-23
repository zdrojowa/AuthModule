<?php

namespace Zdrojowa\AuthModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Zdrojowa\AuthModule\AuthModule;
use Lang;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            AuthModule::displayName() => 'required|string|max:255',
            AuthModule::username() => 'required|string|email|max:255|unique:users',
            AuthModule::password() => 'required|string|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return AuthModule::lang('register');
    }
}
