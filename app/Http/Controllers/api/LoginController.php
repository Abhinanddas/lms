<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Helper;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($login))
        {
            return Helper::apiResponse(
                status: 'error',
                statusCode: 401,
                message: trans('auth.failed')
            );
            return response([
                'message' => 'Invalid login credentials',
            ]);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        $data = [
            'user' => Auth::user(),
            'access_token' => $accessToken
        ];

        return Helper::apiResponse(
            data: $data,
            message: trans('auth.login')

        );
    }

    public function logout(Request $request)
    {

        $request->user()->token()->revoke();
        return Helper::apiResponse(
            message: trans('auth.logout')
        );
    }
}
