<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clock extends Model
{
    protected $fillable = [
        'user_id', 'check_in_date', 'check_out_date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
