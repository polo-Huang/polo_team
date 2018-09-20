<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
	protected $fillable = [
        'game_id', 'user_id', 'result', 'level'
    ];
}
