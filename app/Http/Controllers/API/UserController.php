<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User as data;

class UserController extends Controller
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt([
        	'email' => request('email'), 
        	'password' => request('password')
        ])) {
            $user = Auth::user();
            $email = $request->get('email');
            $success['email'] = $email;
            $success['token'] = $user->createToken('MyApp')-> accessToken;

            return response()->json(['success' => $success], 200);
        } else {
        	$success['error'] = 'Unauthorised';
            $success['message'] = 'You username or password incorrect!';
            return response()->json([$success], 401);
        }
    }
}
