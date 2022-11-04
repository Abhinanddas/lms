<?php

namespace App\Http;

class Helper
{
    public static function apiResponse($message, $data = '', $status = 'success', $statusCode = 200)
    {
        return response()->json(['status' => $status, 'message' => $message, 'data' => $data], $statusCode);
    }
}
