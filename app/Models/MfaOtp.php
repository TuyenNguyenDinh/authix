<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MfaOtp extends Model
{
    protected $fillable = [
        'user_id',
        'otp_code',
        'expired_at',
        'verified_at',
        'attempts',
        'device_hash',
    ];
}
