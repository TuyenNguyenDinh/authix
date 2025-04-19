<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('responseSuccess')) {
    function responseSuccess($data = null, $message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

if (!function_exists('responseSuccessNotData')) {
    function responseSuccessNotData($message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], $code);
    }
}

if (!function_exists('responseError')) {
    function responseError($message = null, $code = 400): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}

if (!function_exists('responseNotFound')) {
    function responseNotFound($message = null, $code = 404): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}
