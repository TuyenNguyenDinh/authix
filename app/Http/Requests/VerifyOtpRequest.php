<?php

namespace App\Http\Requests;

use App\Commons\Requests\ApiRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends ApiRequest
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
            'otp' => 'required|string|min:6|max:6',
            'temp_token' => 'required|string|exists:mfa_otps',
        ];
    }

    public function messages(): array
    {
        return [
            'otp.required' => config('messages.auth.otp_required'),
            'otp.string' => config('messages.auth.otp_string'),
            'otp.min' => config('messages.auth.otp_min', ['min' => 6]),
            'otp.max' => config('messages.auth.otp_max', ['max' => 6]),
            'temp_token.required' => config('messages.auth.temp_token_required'),
            'temp_token.string' => config('messages.auth.temp_token_string'),
            'temp_token.exists' => config('messages.auth.temp_token_exists'),
        ];
    }
}
