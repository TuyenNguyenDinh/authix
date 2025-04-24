<?php

namespace App\Http\Services\Auth;

class LogoutService
{
    public function run(): void
    {
        auth()->user()->currentAccessToken()->delete();
    }
}
