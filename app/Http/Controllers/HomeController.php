<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::where('status', 'active')->orderBy('updated_at', 'desc')->first();
        if ($home == null)
            return view('/cannotAccess', ['error' => 'SYSTEMUPGRADE']);
        $home->users = User::all();
        return view('home', ['home' => $home]);
    }

    public function user($id)
    {
        $user = User::find($id);
        if ($user == null)
            return view('/cannotAccess', ['error' => 'NOTFOUND']);
        return view('user', ['user' => $user]);
    }

    public function cannotAccess($error)
    {
        return view('cannotAccess', ['error' => $error]);
    }
}
