<?php

namespace App\Http\Requests;

use App\Commons\Requests\ApiRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class LoginRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|min:8|max:50|exists:users',
            'password' => 'required|string|min:8|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => config('messages.auth.email_required'),
            'email.email' => config('messages.auth.email_email'),
            'email.min' => config('messages.auth.email_min', ['min' => 8]),
            'email.max' => config('messages.auth.email_max', ['max' => 50]),
            'email.exists' => config('messages.auth.email_exists'),
            'password.required' => config('messages.auth.password_required'),
            'password.string' => config('messages.auth.password_string'),
            'password.min' => config('messages.auth.password_min', ['min' => 8]),
            'password.max' => config('messages.auth.password_max', ['max' => 50]),
        ];
    }
}
