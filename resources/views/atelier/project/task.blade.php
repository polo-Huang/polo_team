@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('meta')
	<meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('after_link')
	<script src="{{ asset('/js/atelier/project/task.js') }}"></script>
@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/atelier/index') }}">工作室</a></li>
  <li><a href="{{ url('/atelier/project/list') }}">项目</a></li>
  <li><a href="{{ url('/atelier/project/tasks/'.$task->project_id) }}">{{ $task->project->name }}</a></li>
  <li class="active">#{{ $task->id }}</li>
</ol>
</section>

<div class="inside project-task">
	<input type="hidden" name="confirm_transferred" value="确认删除任务#{{ $task->id }}？">
	<input type="hidden" name="task_id" value="{{ $task->id }}">
	<input type="hidden" name="project_id" value="{{ $task->project_id }}">
	<section>
		<ol class="action-btn-group">
  			<li><a href="{{ url('/atelier/project/tasks/'.$task->project_id) }}">任务</a></li>
			@if ($task->status != 'new')
			<li><a class="change-status-btn" status="new" href="javascript:void(0);">新的</a></li>
			@endif
			@if ($task->status != 'in_progress')
			<li><a class="change-status-btn" status="in_progress" href="javascript:void(0);">工作中</a></li>
			@endif
			@if ($task->status != 'resolved')
			<li><a class="change-status-btn" status="resolved" href="javascript:void(0);">已解决</a></li>
			@endif
			<li><a href="{{ url('/atelier/project/taskForm/'.$task->project_id.'/'.$task->id) }}">编辑</a></li>
			<li><a class="delete-btn" href="javescript:void(0);">删除</a></li>
		</ol>
	</section>
	<h3 class="mt-0 mb-20">{{ ucwords($task->type) }}&nbsp;#{{ $task->id }}</h4>

	<div class="task-panel">
		<h4>{{ $task->title }}</h4>
		<p>
			由&nbsp;{{ $task->creater->name }}&nbsp;在&nbsp;{{ $task->created_at }}&nbsp;创建.
			@if ($task->created_at < $task->updated_at)&nbsp;更新于&nbsp;{{ $task->updated_at }}.@endif
		</p>
		<div class="row mx-0">
			<div class="col-xs-6 px-0">
				<label class="col-xs-4 col-md-3 px-0">状态:</label>
				<p class="col-xs-8">{{ trans('options.task_status_'.$task->status) }}</p>
				<label class="col-xs-4 col-md-3 px-0">优先级:</label>
				<p class="col-xs-8">{{ trans('options.task_priority_'.$task->priority) }}</p>
				@if ($task->receiver_id != null)
					<label class="col-xs-4 col-md-3 px-0">指派给:</label>
					<p class="col-xs-8">{{ $task->receiver->name }}</p>
				@endif
			</div>
			<div class="col-xs-6 px-0">
				<label class="col-xs-4 col-md-3 px-0">开始时间:</label>
				<p class="col-xs-8">{{ date('Y-m-d', strtotime($task->start_date)) }}</p>
				<label class="col-xs-4 col-md-3 px-0">预期时间:</label>
				<p class="col-xs-8">{{ number_format($task->working_hours, 1) }}&nbsp;小时</p>
				<label class="col-xs-4 col-md-3 px-0">reopened:</label>
				<p class="col-xs-8">{{ $task->reopened ? '是' : '否' }}</p>
			</div>
		</div>
		<hr>
		<div class="min-hight-200">
			<label>详情:</label><br>
			{!! $task->details !!}
		</div>
	</div>
</div>
@endsection