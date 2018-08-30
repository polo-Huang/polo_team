<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'user_id', 'name', 'title', 'introduce', 'about', 'address', 'phone', 'email'
    ];
}
