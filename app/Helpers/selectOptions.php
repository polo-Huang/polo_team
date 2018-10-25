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

    /* project-task */ 
    function getProjectTaskTypeArray()
    {
        $projectTaskTypeArray = ['feature' => 'Feature', 'bug' => 'Bug'];
        return $projectTaskTypeArray;
    }
    function getProjectTaskPriorityArray()
    {
        $projectTaskPriorityArray = ['normal' => 'Normal (普通)', 'low' => 'Low (低)', 'high' => 'High (高)'];
        return $projectTaskPriorityArray;
    }
