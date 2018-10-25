@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('link')

@endsection

@section('after_link')

@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/atelier/index') }}">工作室</a></li>
  <li><a href="{{ url('/atelier/project/list') }}">项目</a></li>
  <li><a href="{{ url('/atelier/project/details/'.$project->id) }}">{{ $project->name }}</a></li>
  <li class="active">任务</li>
</ol>
</section>

<div class="inside project-list">
	<section>
		<ol class="action-btn-group">
			<li><a href="{{ url('/atelier/project/taskForm/'.$project->id) }}">添加任务</a></li>
			<li><a href="javascript:void(0);">工作时长</a></li>
		</ol>
	</section>
	<h4 class="mb-20">项目</h4>

	<div>
		@if (count($tasks) > 0)
		<div>
			<dl>
				@foreach ($tasks as $key => $task)
				<dd><a class="a-project" href="{{ url('/atelier/project/task/'.$task->id) }}">{{ $task->title }}</a></dd>
				@endforeach
			</dl>
		</div>
		@else
		<div>
			<p class="help-block">没有任务</p>
		</div>
		@endif
	</div>
</div>
@endsection