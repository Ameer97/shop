<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    function register()
    {
        return view('user.auth.userAccess');
    }

    function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => "unique:users",
            "password" => "required"
        ];
        $data = $this->validate($request, $rules);
        User::create($data);
        return Response::redirectTo('/user');

    }

}
