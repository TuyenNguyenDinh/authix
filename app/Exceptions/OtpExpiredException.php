<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class OtpExpiredException extends Exception
{
    protected $message = 'OTP expired or invalid';

    protected $code = Response::HTTP_BAD_REQUEST;
}
