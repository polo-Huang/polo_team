<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Home;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id = null)
    {
        if ($user_id != null) {
            $home = Home::where('user_id', $user_id)->first();
            $data = ['role' => 'user', 'home' => $home];
        } else {
            $home = Home::orderBy('id')->first();
            $users = User::all();
            $data = ['role' => 'all', 'home' => $home, 'users' => $users];
        }
        return $home == null ? redirect('/') : view('home', $data);
    }
}
