<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clock;
use Auth;

class ClockController extends Controller
{
    public function checkInView()
    {
    	return view('/atelier/clock/checkInView');
    }

    public function checkIn()
    {
    	$checkInTime = time();
    	$clock = Clock::create([
    		'user_id' => Auth::id(),
    		'check_in_date' => date('Y-m-d H:i:s', $checkInTime),
    	]);
    	return json_encode(['success' => true, 'returnUrl' => '/atelier/clock/checkInSuccess']);
    }

    public function checkInSuccess()
    {
    	return view('/atelier/clock/checkInSuccess');
    }

    public function checkOutView()
    {
    	return view('/atelier/clock/checkOutView');
    }

    public function checkOut()
    {
    	setCheckOutDate();
    	return json_encode(['success' => true, 'returnUrl' => '/atelier/clock/checkOutSuccess']);
    }

    public function checkOutSuccess()
    {
    	return view('/atelier/clock/checkOutSuccess');
    }
}
