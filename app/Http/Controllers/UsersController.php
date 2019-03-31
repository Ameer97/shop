<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Owner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    function getAllUsers()
    {
        $user = User::all();
        $data = [
            "users" => $user,
        ];

        return view('users.index', $data);
    }

}
