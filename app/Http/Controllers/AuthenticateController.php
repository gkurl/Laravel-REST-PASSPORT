<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends Controller
{

    public function __construct()
    {
    	//use jwt auth middleware for incoming requests except auth route as that would block user from obtaining
        $this->middleware('jwt.auth',['except' => ['authenticate']]);
    }

    public function index(){

        $users = User::all();
        return $users;
    }

    public function authenticate(Request $request){

        $credentials = $request->only('email', 'password');


        try {
            // verify the credentials and create a token for the user

            if (!$token = JWTAuth::attempt($credentials)){


                return response()->json(['error' => 'invalid_credentials'],401);

            }
        } catch(JWTException $e) {

            //something went wrong

            return response()->json(['error' =>'could_not_create_token'],500);
        }

        //if no errors, we can return a jwt

        return response()->json(compact('token'));
    }
}
//The try block in the authenticate method attempts to produce a token using the JWTAuth facade with the user's credentials.
// If something goes wrong with that, the method will return a 401 and say the credentials are invalid.
// In other cases where an exception is thrown, it will return a 500 indicating an internal server error and saying that something went wrong.
// If we are able to get past that then we can return a token. Returning it with compact('token') puts the object on a key called token
// which will come in handy when we read it with Satellizer.
