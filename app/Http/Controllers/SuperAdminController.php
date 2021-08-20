<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;
use App\Http\Requests\SuperAdminRequest;
use App\Http\Requests\SuperAdminCreateRequest;
use Validator;
use Arr;

class SuperAdminController extends Controller
{
    //super admin registration
    function create(SuperAdminCreateRequest $request)
    {
        $validated = $request->validated(); //validation
        $super_admin = SuperAdmin::create($validated);

        $super_admin->save(); //save the data

        return response()->json(['message'=>'create super admin'],200);
    }

    //super admin login
    public function login(SuperAdminRequest $request){
        $validated = $request->validated();//validation

        $super_admin = SuperAdmin::where('email', $validated['email'])->first();
        if (!Auth::attempt($validated,true)) {

            return response()->json(['message'=>'wrong'],200);
        }


        return response([
            'message' => ['success']
        ], 404);
    }



}
