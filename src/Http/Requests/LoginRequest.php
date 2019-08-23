<?php

namespace Zdrojowa\AuthModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Zdrojowa\AuthModule\AuthModule;
use Lang;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            AuthModule::username() => 'required|email',
            AuthModule::password() => 'required'
        ];
    }

    public function messages()
    {
        return AuthModule::lang('login');
    }
}
