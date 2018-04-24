<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthenticateController extends Controller
{
    public function index(){

        //TODO: show users
    }

    public function authenticate(Request $request){

        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)){

                return response()->json(['error' => 'invalid_credentials'],401);

            }
        } catch(JWTException $e) {
            //Something went wrong
            return response()->json(['error' =>'could_not_create_token'],500);
        }

        //if no errors, we can return a jwt

        return response()->json(compact('token'));
    }
}