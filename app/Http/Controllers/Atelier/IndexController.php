<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home;

class IndexController extends Controller
{
    public function index()
    {
    	$home = Home::where('status', 'active')->orderBy('updated_at', 'desc')->first();
        return view('/atelier/index', '');
    }
}
