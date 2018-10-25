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
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>分类</th>
					<th>状态</th>
					<th>优先级</th>
					<th>标题</th>
					<th>指派给</th>
					<th>更新于</th>
				</tr>
			</thead>
			<tbody>
				@if (count($tasks) > 0)
					@foreach ($tasks as $key => $task)
					<tr>
						<td>{{ $task->id }}</td>
						<td>{{ $task->type }}</td>
						<td>{{ trans('options.task_status_'.$task->status) }}</td>
						<td>{{ trans('options.task_priority_'.$task->priority) }}</td>
						<td><a href="{{ url('/atelier/project/task/'.$task->id) }}">{{ $task->title }}</a></td>
						<td>{{ $task->receiver->name }}</td>
						<td>{{ $task->updated_at }}</td>
					</tr>
					@endforeach
				@else
					<tr>
						<p class="help-block">没有任务</p>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection