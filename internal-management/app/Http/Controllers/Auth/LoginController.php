<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        // ユーザーがログインしていなければ新規登録画面に移行する
        if (!auth()->check()) {
            return route('register');
        }

        // ログイン後にリダイレクトする先を指定する場合はここに追加する

        return RouteServiceProvider::HOME;
    }

    public function showLoginForm()
    {
        // ユーザーがログインしていなければ新規登録画面に移行する
        if (!auth()->check()) {
            return redirect()->route('register');
        }

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
