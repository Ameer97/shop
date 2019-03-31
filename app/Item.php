<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        "name",
        "price",
        "quantity",
        "category_id",
        "disc",
    ];


    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function orders(){
        return $this->belongsToMany(Order::class);
    }

    function getCategories($id)
    {
        return Category::where('id', '=', $id)->get(['name'])->first();
    }
}
