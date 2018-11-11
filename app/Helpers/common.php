<?php
    use App\Clock;

    function setCheckOutDate()
    {
    	$clock = Clock::orderBy('check_in_date', 'desc')->first();
    	if ($clock->check_out_date == null) {
    		$checkOutTime = time();
    		$clock->check_out_date = date('Y-m-d h:i:s', $checkOutTime);
    		$clock->save();
    	}
    }