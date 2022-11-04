<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        // if (Auth::guard('api')->check()) {
        //     $user = Auth::guard('api')->user();
        // }
        dd(Auth::user()->id);
    }
}
