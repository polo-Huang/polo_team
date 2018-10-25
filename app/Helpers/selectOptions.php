<?php
    use App\User;

    function getUserArray()
    {
    	$users = User::where('status', 'active')->get();
    	$userArray = [];
    	foreach ($users as $key => $user) {
    		$userArray[$user->id] = $user->name;
    	}
    	return $userArray;
    }
