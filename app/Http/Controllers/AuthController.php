<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\Auth\LoginService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
      $data = $request->validated();
      $loginService = resolve(LoginService::class)->run($data);

      return $loginService ? responseSuccessNotData(config('messages.auth.otp_sent')) : responseError();
    }
}
