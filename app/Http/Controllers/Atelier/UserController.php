<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    public function details($id)
    {
        $user = Auth::user();
        return view('/atelier/user/details', ['user' => $user]);
    }

    public function list()
    {
        $users = User::where('status', 'active');
        return view('/atelier/user/list', ['users' => $users]);
    }
}
