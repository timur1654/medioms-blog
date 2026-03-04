<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Intarfaces\UserRepositoryInterface;
use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthServiceInterface $auth
    )
    {
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $this->auth->register($request->validated());

        $this->auth->attemptLogin($request->email, $request->password);

        $request->session()->regenerate();

        return redirect()->route('admin.posts.index');
    }

    public function login(LoginRequest $request)
    {
        $valid = $request->validated();

        if(!$this->auth->attemptLogin($valid['email'], $valid['password'], (bool)($valid['remember_me'] ?? false))){
            return back()->withErrors(['email' => 'Неверная почта или пароль']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('admin.posts.index'))->with('status', 'С возвращением');
    }

    public function logout()
    {
        $this->auth->logout();

        return redirect()->route('login')->with('status', 'Вы вышли из аккаунта');
    }
}
