<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class signupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ["required", "min:2", "max:255"],
            'last_name' => ["required", "min:2", "max:255"],
            'email' => ["required", "email", "unique:signup_users"],
            'mobile_number' => ["required", "unique:signup_users"],
            'location' => ["required"],
            'user_type' => ["in:user,pro_user"],
            'password' => ["required", "min:8", "confirmed"],
        ];
    }
}
