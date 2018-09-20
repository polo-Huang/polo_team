<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'creater_id', 'name', 'introduce', 'url'
    ];
}
