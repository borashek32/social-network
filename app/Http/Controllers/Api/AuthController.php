<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|max:255|email',
            'password' => 'required|between:8,255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors'   => $validator->errors()->all(),
                'status'   => 422
            ]);
        }
        
        $passwordGrantClient = Client::where('password_client', 1)->first();
        $data = [
            'grant_type'     => 'password',
            'client_id'      => $passwordGrantClient->id,
            'client_secret'  => $passwordGrantClient->secret,
            'username'       => $request->email,
            'password'       => $request->password,
            'scope'          => ''
        ];
        $tokenRequest = Request::create('/oauth/token', 'POST', $data);

        return app()->handle($tokenRequest);
        
        // $accessToken = Auth::user()->createToken('authToken')->accessToken;
        // return $response([
        //     'user'          => Auth::user(),
        //     'access_token'  => $accessToken
        // ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|max:255|email|unique:users',
            'password' => 'required|between:8,255|confirmed'
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors'   => $validator->errors()->all(),
                'status'   => 422
            ]);
        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if(!$user) {
            return response()->json([
                'success'   => false,
                'message'   => 'Registration failed',
                'status'    => 500
            ]);
        }
        return response()->json([
            'success'   => true,
            'message'   => 'Registration successful',
            'status'    => 200
        ]);
    }
}
