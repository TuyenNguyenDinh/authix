<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use App\Notifications\OptNotification;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    /**
     * @throws \Exception
     */
    public function run(array $data): true
    {
        $user = User::query()->where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw new \Exception('Invalid credentials', 401);
        }
        // TODO: Uncomment this line when implementing verification
//        $token = $user->createToken('auth_token')->plainTextToken;
        $opt = resolve(CreateMfaOptService::class)->run($user->id, $data['device_hash'] ?? null);
        $user->notify(new OptNotification($opt->otp_code));

        return true;
    }
}
