<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
use App\GameResult;
use Auth;

class GameController extends Controller
{
    public function test($id)
    {
    	$game = Game::find($id);
    	$gameResults = Auth::user()->gameResults()->where('game_id', $id)->orderBy('created_at', 'desc')->get();
    	// dd($gameResults);
    	return view('/atelier/game/test', ['game' => $game, 'gameResults' => $gameResults]);
    }

    public function submit(Request $request)
    {
    	$data = $request->all();
    	$data['user_id'] = Auth::id();
    	$gameResult = GameResult::create($data);
    	return redirect('/atelier/game/test/'.$data['game_id']);
    }
}
