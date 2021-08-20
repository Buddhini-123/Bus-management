<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    //user registration
    function create(UserCreateRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);

        $user->save(); //save the data

        return response()->json(['message'=>'create user'],200);
    }

    //user login
    function login(UserRequest $request)
    {


        $user=User::where('email', $request->email)->first();
        //print_r($data);
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => ['These credentials do not match our records']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);

    }

}
