<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignup extends FormRequest {

    public function rules() {
        return [
            'name' => 'Required|min:2|max:90',
            'email' => 'Required|email|unique:users,email',
            'password' => 'Required|min:4|confirmed',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'The name is required.',
            'name.min' => 'The name must be at least two characters.',
        ];
    }

}
