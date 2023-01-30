<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            "username" => "required|string|email|max:255|exists:users,email",
            "password" => "required|string",
        ];
    }
}
