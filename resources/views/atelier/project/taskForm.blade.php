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
  <li><a href="{{ url('/atelier/project/tasks/'.$project->id) }}">任务</a></li>
  <li class="active">{{ $task == null ? '添加' : '编辑' }}任务</li>
</ol>
</section>

<div class="inside project-list">
	<!-- <section>
		<ol class="action-btn-group">
			<li><a href="{{ url('/atelier/project/projectForm') }}">添加项目</a></li>
			<li><a href="javascript:void(0);">工作时长</a></li>
		</ol>
	</section> -->

	<div class="card card-white mb-20-imp">
	  <div class="card-header">
	    <h4 class="px-10">{{ $task == null ? '添加' : '编辑' }}任务</h4>
	  </div>
	  <div class="card-block">
	  	{!! Form::open(['method' => 'post', 'action' => 'Atelier\ProjectController@submitTask']) !!}
        {!! Form::hidden('project_id', $project->id) !!}
        {!! Form::hidden('task_id', $task == null ? null : $task->id) !!}
        @if ($errors->has('task_id'))
          <p class="help-block">{{ $errors->first('task_id') }}</p>
        @endif
        <div class="form-group row @if($errors->has('title')) has-error @endif">
          <label class="col-sm-2 text-right form-label"><span><i class="i-required">*</i></span>标题</label>
          <div class="col-sm-10">
            {!! Form::text('title', $task == null ? null : $task->title, ['class' => 'form-control']) !!}
	          @if ($errors->has('title'))
	            <p class="help-block">{{ $errors->first('title') }}</p>
	          @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group row @if($errors->has('type')) has-error @endif">
              <label class="col-sm-4 text-right form-label"><i class="i-required">*</i>类型</label>
              <div class="col-sm-8">
                {!! Form::select('type', ['feature' => 'Feature', 'bug' => 'Bug'], $task == null ? null : $task->type, ['class' => 'form-control']) !!}
                @if ($errors->has('type'))
                  <p class="help-block">{{ $errors->first('type') }}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group row @if($errors->has('priority')) has-error @endif">
              <label class="col-sm-4 text-right form-label"><i class="i-required">*</i>优先级</label>
              <div class="col-sm-8">
                {!! Form::select('priority', ['normal' => 'Normal (普通)', 'low' => 'Low (低)', 'high' => 'High (高)'], $task == null ? null : $task->type, ['class' => 'form-control']) !!}
                @if ($errors->has('priority'))
                  <p class="help-block">{{ $errors->first('priority') }}</p>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 text-right form-label">详情</label>
          <div class="col-sm-10">
            {!! Form::textarea('details', $task == null ? null : $task->details, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group row @if($errors->has('receiver_id')) has-error @endif">
              <label class="col-sm-4 text-right form-label"><i class="i-required">*</i>指派给</label>
              <div class="col-sm-8">
                {!! Form::select('receiver_id', getUserArray(), $task == null ? null : $task->receiver_id, ['class' => 'form-control']) !!}
                @if ($errors->has('receiver_id'))
                  <p class="help-block">{{ $errors->first('receiver_id') }}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group row @if($errors->has('start_date')) has-error @endif">
              <label class="col-sm-4 text-right form-label">开始日期</label>
              <div class="col-sm-8">
                {!! Form::number('start_date', $task == null ? null : $task->start_date, ['class' => 'form-control', 'step' => '0.5', 'min' => '0.5']) !!}
                @if ($errors->has('working_hours'))
                  <p class="help-block">{{ $errors->first('start_date') }}</p>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 text-right form-label">工作时长 (h)</label>
              <div class="col-sm-8">
                {!! Form::number('working_hours', $task == null ? null : $task->working_hours, ['class' => 'form-control']) !!}
              </div>
            </div>
          </div>
        </div>
        <div class="pull-right">
          <input type="submit" value="提交" class="btn btn-success">
        </div>
      {!! Form::close() !!}
      <div class="clearfix"></div>
	  </div>
	</div>
</div>
@endsection