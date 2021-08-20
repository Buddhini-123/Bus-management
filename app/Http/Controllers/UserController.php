<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserCreateRequest;
use Validator;
use Arr;

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
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();
        if (!Auth::attempt($validated,true)) {

            return response()->json(['message'=>'wrong'],200);
        }

        return response([
            'message' => ['success']
        ], 404);

    }

}
