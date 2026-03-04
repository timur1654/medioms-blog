<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink(
          $request->only('email')
        );

        if($status === Password::RESET_LINK_SENT){
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
