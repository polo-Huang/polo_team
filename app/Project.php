<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'creater_id', 'name', 'introduce', 'url'
    ];

    public function tasks()
    {
    	return $this->hasMany('App\ProjectTask');
    }

    public function members()
    {
    	return $this->hasMany('App\ProjectMember');
    }
}
