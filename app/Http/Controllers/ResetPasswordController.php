<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
          function($user, $password){
                $user->password = $password;
                $user->save();

                Auth::login($user);
          }
        );
        if($status === Password::PASSWORD_RESET){
            return redirect()->route('dashboard')->with('status', __($status));
        }
        return back()->withErrors(['email' => __($status)]);
    }
}
