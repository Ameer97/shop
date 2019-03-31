<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "user_id",
     //   "item_id",
    ];


    function items()
    {
       return $this->belongsToMany(Item::class)
           ->withPivot('quantity_order');

    }

    function user()
    {
       return $this->belongsTo(User::class);
    }
}
