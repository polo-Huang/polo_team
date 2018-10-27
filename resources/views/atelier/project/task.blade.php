@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('meta')
	<meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('link')
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('after_link')
  <script src="{{ asset('bootstrap/js/bootstrap-datetimepicker.min.js') }}"></script>
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
	{!! Form::open(['method' => 'post', 'action' => 'Atelier\ProjectController@changeStartDate']) !!}
	<input type="hidden" name="confirm_transferred" value="确认删除任务#{{ $task->id }}？">
	<input type="hidden" name="task_id" value="{{ $task->id }}">
	<input type="hidden" name="project_id" value="{{ $task->project_id }}">

	<div class="modal modal-primary" id="change-start-date-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog animated zoomIn animated-3x" role="document">
      <div class="modal-content">
        <div class="modal-header">
        	修改任务开始日期
        </div>
        <div class="modal-body pt-20">
          <div class="form-group row mt-20">
            <label class="col-sm-2 text-right form-label">开始日期</label>
            <div class="col-sm-10">
              {!! Form::text('start_date', $task == null || $task->start_date == null ? null : date('Y-m-d', strtotime($task->start_date)), ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default my-0" data-dismiss="modal">关闭</button>
          <input type="submit" class="btn btn-primary my-0" value="提交">
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}

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
			<li><a href="javascript:void(0);" data-toggle="modal" data-target="#change-start-date-modal">修改日期</a></li>
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
				<div class="row mx-0">
					<label class="col-xs-4 col-md-3 px-0 mb-10">开始时间:</label>
					<p class="col-xs-8">{{ $task->start_date != null ? date('Y-m-d', strtotime($task->start_date)) : null }}</p>
				</div>
				<div class="row mx-0">
					<label class="col-xs-4 col-md-3 px-0">预期时间:</label>
					<p class="col-xs-8">{{ number_format($task->working_hours, 1) }}&nbsp;小时</p>
				</div>
				<div class="row mx-0">
					<label class="col-xs-4 col-md-3 px-0">reopened:</label>
					<p class="col-xs-8">{{ $task->reopened ? '是' : '否' }}</p>
				</div>
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