<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\User;
use Illuminate\Support\Facades\Response;

class SiteController extends Controller
{
    function siteGust()
    {
        return view('index');
    }

    function dataJson()
    {
        $item = Item::with("category:id,name,disc")->get();
        $user = User::get(['id', 'name']);
        $category = Category::get(['id', 'name']);
        $userId = auth()->id();
        $response = [
            "items" => $item,
            "categories" => $category,
            "users" => $user,
            "log" => $userId,
        ];
        return Response::json($response);
    }



    function siteUser()
    {
        $item = Item::all();
        $user = User::get(['id', 'name']);
        $category = Category::get(['id', 'name']);
        $data = [
            "items" => $item,
            "categories" => $category,
            "users" => $user,
        ];
        return view('user.index', $data);
    }

    function siteOwner()
    {
        return view('owner.index');
    }

    function items()
    {
        $item = Item::all();
        $response = [
            "success" => true,
            "items" => $item,
        ];
        return Response::json($response);
    }


}
