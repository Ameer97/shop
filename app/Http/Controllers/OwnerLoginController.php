<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class OwnerLoginController extends Controller
{
    use AuthenticatesUsers;


    protected function guard()
    {
        return Auth::guard('owner');
    }

    public function username()
    {
        return 'email';
    }
    public function redirectPath()
    {
        return '/dashboard';
    }

    function showLoginForm(){
       return view('owner.auth.login');
   }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
