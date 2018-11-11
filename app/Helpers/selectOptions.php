<?php
    use App\User;

    function getUserArray($type = null)
    {
    	$userQuery = User::where('status', 'active');
        // 除了自己
        if ($type == 'exceptOwn') {
            $userQuery = $userQuery->where('id', '<>', Auth::id());
        }
        $users = $userQuery->get();
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
