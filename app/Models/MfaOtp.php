<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MfaOtp extends Model
{
    protected $fillable = [
        'user_id',
        'otp_code',
        'expired_at',
        'verified_at',
        'attempts',
        'device_hash',
        'temp_token',
    ];

    public function isExpired(): bool
    {
        return $this->expired_at < now();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
