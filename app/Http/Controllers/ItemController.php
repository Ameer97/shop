<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::with("category:id,name")->get();
        $data = [
            "items" => $item,
        ];

        return view('item.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $data = [
            "categories" => $category
        ];
        return view('item.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "unique:items",
            "price" => 'required|integer',
            "quantity" => "required|integer",
            "category_id" => "required",
            "disc" => "required",
        ];
        $data = $this->validate($request, $rules);
        Item::create($data);
        return Response::redirectTo('/dashboard/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $category = Category::all();
        $data = [
            "categories" => $category,
            "item" => $item,
        ];
        return view('item.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            "name" => "unique:items,name" . ($item->id ? ",$item->id" : ''),
            "price" => "required|integer",
            "quantity" => "required|integer",
            "category_id" => "required",
            "disc" => "required",
        ];
        $data = $this->validate($request, $rules);
        $item->update($data);
        return Response::redirectTo('/dashboard/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return Response::redirectTo('/dashboard/items');
    }
}
