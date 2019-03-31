<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Owner extends Authenticatable
{
    protected $fillable = [
        "name",
        "password",
        "email",
    ];

    function setPasswordAttribute($newPassword){
        $this->attributes["password"]=Hash::make($newPassword);
    }
}


/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com