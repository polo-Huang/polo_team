<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $fillable = [
        'project_id', 'creater_id', 'receiver_id', 'title', 'type', 'status', 'priority', 'details', 'working_hours', 'start_date',
    ];

    public function creater()
    {
    	return $this->belongsTo('App\User', 'creater_id');
    }

    public function receiver()
    {
    	return $this->belongsTo('App\User', 'receiver_id');
    }

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
}
