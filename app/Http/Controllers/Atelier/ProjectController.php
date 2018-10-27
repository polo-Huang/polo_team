<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectTask;
use Validator;
use Auth;
use Schema;

class ProjectController extends Controller
{
    public function list()
    {
    	$projects = Project::all();
    	return view('/atelier/project/list', ['projects' => $projects]);
    }

    public function form($id = null)
    {
    	$project = Project::find($id);
    	return view('/atelier/project/form', ['project' => $project]);
    }

    public function submit(Request $request)
    {
    	$data = $request->all();
    	// dd($data);
    	$rules = ['name' => 'required', 'url' => 'nullable|url'];
    	$validator = Validator::make($data, $rules);
    	if ($validator->fails()) {
    		return redirect()
    		->back()
    		->withInput()
    		->withErrors($validator->errors());
    	}

    	$data['creater_id'] = Auth::id();
    	$project = Project::create($data);
    	return redirect('/atelier/project/details/'.$project->id);
    }

    public function details($id)
    {
    	$project = Project::find($id);
        if ($project == null)
            return view('/atelier/cannotAccess', ['error' => 'NOTFOUND']);
    	return view('/atelier/project/details', ['project' => $project]);
    }

    public function tasks(Request $request, $projectId)
    {
        $project = Project::find($projectId);
        if ($project == null)
            return view('/atelier/cannotAccess', ['error' => 'NOTFOUND']);
        $query = $project->tasks();
        $searchData = [];
        // 默认排序组合
        $searchData['sort'] = $request->get('sort');
        $searchData['order'] = $request->get('order');
        // dd($searchData['sort']);
        if ($searchData['sort'] == null) {
            $query = $query->orderBy('status', 'asc')->orderBy('start_date', 'asc');
        } else {
            if (!Schema::hasColumn('project_tasks', $searchData['sort']))
                return view('/atelier/cannotAccess', ['error' => 'PARAMETERS_ERROR']);
            $query = $query->orderBy($searchData['sort'], $searchData['order']);
        }
        $searchData['columnCount'] = $request->get('columnCount') == null ? 9 : $request->get('columnCount');
        $tasks = $query->paginate($searchData['columnCount']);
        return view('/atelier/project/tasks', ['project' => $project, 'tasks' => $tasks, 'searchData' => $searchData]);
    }

    public function taskForm($projectId, $taskId = null)
    {
        $project = Project::find($projectId);
        $task = ProjectTask::find($taskId);
        return view('/atelier/project/taskForm', ['project' => $project, 'task' => $task]);
    }

    public function submitTask(Request $request)
    {
        $data = $request->all();
        $project = Project::find($request->get('project_id'));
        if ($project == null)
            return view('/atelier/cannotAccess', ['error' => 'NOTFOUND']);
        // dd($data);
        $rules = [
            'title' => 'required',
            'type' => 'required|in:bug,feature',
            'priority' => 'required|in:low,normal,high',
            'working_hours' => 'nullable',
        ];
        if ($request->get('task_id') != null) {
            $rules['task_id'] = 'required|exists:project_tasks,id';
        }
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator->errors());
        }
        if ($request->get('task_id') == null) {
            $data['creater_id'] = Auth::id();
            $task = ProjectTask::create($data);
        } else {
            $task = ProjectTask::find($data['task_id']);
            $task->receiver_id = $data['receiver_id'];
            $task->title = $data['title'];
            $task->type = $data['type'];
            $task->priority = $data['priority'];
            $task->details = $data['details'];
            $task->start_date = $data['start_date'];
            $task->working_hours = $data['working_hours'];
            $task->save();
        }
        return redirect('/atelier/project/task/'.$task->id);
    }

    public function task($id)
    {
        $task = ProjectTask::find($id);
        if ($task == null)
            return view('/atelier/cannotAccess', ['error' => 'NOTFOUND']);
        return view('/atelier/project/task', ['task' => $task]);
    }

    public function changeTaskStatus(Request $request)
    {
        $status = $request->get('status');
        $task = ProjectTask::find($request->get('id'));
        if ($task == null || !in_array($status, ['new', 'in_progress', 'resolved'])) 
            return json_encode(['success' => false, 'error' => trans('errors.PARAMETERS_ERROR')]);
        $task->status = $status;
        $task->save();
        return json_encode(['success' => true]);
    }

    public function changeStartDate(Request $request)
    {
        $id = $request->get('task_id');
        $task = ProjectTask::find($id);
        if ($task == null) 
            return json_encode(['success' => false, 'error' => trans('errors.PARAMETERS_ERROR')]);
        $startDate = $request->get('start_date');
        $task->start_date = $startDate;
        $task->save();
        return redirect('/atelier/project/task/'.$id);
    }

    public function deleteTask(Request $request)
    {
        $status = $request->get('status');
        $task = ProjectTask::find($request->get('id'));
        if ($task == null) 
            return json_encode(['success' => false, 'error' => trans('errors.PARAMETERS_ERROR')]);
        $task->delete();
        return json_encode(['success' => true]);
    }
}
