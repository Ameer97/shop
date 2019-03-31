<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        "name",
        "disc",
    ];

    function items(){
        $this->hasMany(Item::class);
    }
    public function delete()
    {
        Item::where("category_id", $this->id)->delete();
        return parent::delete();
    }
}
