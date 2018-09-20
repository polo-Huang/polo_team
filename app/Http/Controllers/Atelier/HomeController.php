<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home;
use App\User;
use App\Project;

class HomeController extends Controller
{
    public function index()
    {
    	$home = Home::where('status', 'active')->orderBy('updated_at', 'desc')->first();
        if ($home == null)
            return view('/cannotAccess', ['error' => 'SYSTEMUPGRADE']);

        $home->userCount = User::count();
        $home->projectCount = Project::count();
        return view('/atelier/index', ['home' => $home]);
    }
}
