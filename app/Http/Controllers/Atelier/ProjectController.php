<?php

namespace App\Http\Controllers\Atelier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Validator;
use Auth;

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
    	return view('/atelier/project/details', ['project' => $project]);
    }
}
