<?php

namespace App\Http\Requests\Dashboard\Administration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AdminRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(6)->mixedCase()],
            'roles'    => 'nullable|array',
        ];

        if ($this->isMethod('PUT')) {
            $rules['password'] = ['nullable', 'confirmed', Password::min(6)->mixedCase()];
            $rules['email'] = 'required|email|max:255|unique:users,id,'.$this->user()->id;
        }

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
