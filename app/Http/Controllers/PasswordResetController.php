<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function forgot(){
        $credentials = request()->validate([
            'email' => 'required|email'
        ]);
        Password::sendResetLink($credentials);

        return $this->respondWithMessage("Reset password link sent on your email id");
    }

}
