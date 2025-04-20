<?php

namespace App\Http\Services\Auth;

use App\Exceptions\OtpExpiredException;
use App\Models\MfaOtp;

class VerifyMfaOptService
{
    /**
     * @throws OtpExpiredException
     */
    public function run(array $data): array
    {
        $tempToken = $data['temp_token'];
        $otpCode = $data['otp'];
        $mfaOtp = MfaOtp::query()->with('user')->where('temp_token', $tempToken)->first();

        if ($mfaOtp->isExpired() || $mfaOtp->otp_code !== $otpCode) {
            throw new OtpExpiredException();
        }

        $mfaOtp->verified_at = now();
        $mfaOtp->save();

        return [
            'token' => $mfaOtp->user->createToken('auth_token')->plainTextToken,
        ];
    }
}
