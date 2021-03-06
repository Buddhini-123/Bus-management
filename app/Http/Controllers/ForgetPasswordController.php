<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{

    public function forgot(){
        $credentials = request()->validate([
            'email' => 'required|email'
        ]);
        Password::sendResetLink($credentials);

        return $this->respondWithMessage("Reset password link sent on your email id");
    }

    public function reset(ResetPasswordRequest $request){



        $email_password_status = Password::reset(request()->validate(), function ($user,$password)
        {
            $user->password = $password;
            $user->save();
        });

        if($email_password_status==Password::INVALID_TOKEN){
            return $this->respondBadRequest(ApiCode::INVALID_RESET_PASSWORD_TOKEN);
        }

        return $this->respondWithMessage("Password Successfully Changed");

    }


}
