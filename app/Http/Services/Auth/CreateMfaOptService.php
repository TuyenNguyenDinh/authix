<?php

namespace App\Http\Services\Auth;

use App\Models\MfaOtp;
use Illuminate\Support\Str;
use Random\RandomException;

class CreateMfaOptService
{
    /**
     * @throws RandomException
     */
    public function run(int $userId, ?string $deviceHash = null): MfaOtp
    {
        return MfaOtp::query()->create([
            'user_id' => $userId,
            'otp_code' => random_int(100000, 999999),
            'expired_at' => now()->addMinutes(5),
            'attempts' => 0,
            'device_hash' => $deviceHash,
            'temp_token' => Str::uuid(),
        ]);
    }
}
