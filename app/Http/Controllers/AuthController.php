<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Http\Services\Auth\LoginService;
use App\Http\Services\Auth\VerifyMfaOptService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
      $data = $request->validated();
      $loginData = resolve(LoginService::class)->run($data);

      return $loginData ? responseSuccess($loginData,
        config('messages.auth.otp_sent')
      ) : responseError();
    }

    public function verifyOtp(VerifyOtpRequest $request): JsonResponse
    {
        $data = $request->validated();
        $verify = resolve(VerifyMfaOptService::class)->run($data);

        return $verify ? responseSuccess($verify, config('messages.auth.otp_verified')) : responseError();
    }

    public function me(Request $request): JsonResponse
    {
        return responseSuccess($request->user(), config('messages.common.success'));
    }
}
