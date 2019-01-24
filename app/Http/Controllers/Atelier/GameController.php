<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
use App\GameResult;
use Auth;
use Validator;

class GameController extends Controller
{
    public function cards()
    {
        $games = Game::get();
        return view('/atelier/game/cards', ['games' => $games]);
    }

    public function form($id = null)
    {
        $game = Game::find($id);
        return view('/atelier/game/form', ['game' => $game]);
    }

    public function submit(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'url' => 'nullable',
        ];
        $validator = Validator::make($data, $rules);
        // dd($members);
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator->errors());
        }
        if (empty($data['id'])) {
            $game = new Game();
            $game->creater_id = Auth::id();
        } else {
            $game = Game::findOrFail($data['id']);
        }
        $game->name = $data['name'];
        $game->type = $data['type'];
        $game->url = $data['url'];
        $game->save();
        return redirect('/atelier/game/cards');
    }

    public function lottery($id)
    {
    	$game = Game::find($id);
    	$gameResults = Auth::user()->gameResults()->where('game_id', $id)->orderBy('created_at', 'desc')->get();
    	// dd($gameResults);
    	return view('/atelier/game/lottery', ['game' => $game, 'gameResults' => $gameResults]);
    }

    public function submitLottery(Request $request)
    {
    	$data = $request->all();
    	$data['user_id'] = Auth::id();
    	$gameResult = GameResult::create($data);
    	return redirect('/atelier/game/lottery/'.$data['game_id']);
    }

    public function timer()
    {
        return view('/atelier/game/timer');
    }
}
