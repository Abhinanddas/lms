<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    public function signup(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            'mobile' => 'required',
        ]);

        
        $data = request()->only('name', 'email', 'password', 'mobile', 'is_admin');
        
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile_no' => $data['mobile'],
            'is_admin' => $data['is_admin'] ? 1 : 0,
        ]);
        
        $client = \Laravel\Passport\Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $data['email'],
            'password'      => $data['password'],
            'scope'         => null,
        ]);


        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return \Route::dispatch($proxy);
    }
}
