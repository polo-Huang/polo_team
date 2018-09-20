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
  <li class="active">{{ $project == null ? '添加' : '编辑' }}项目</li>
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
	    <h4 class="px-10">{{ $project == null ? '添加' : '编辑' }}项目</h4>
	  </div>
	  <div class="card-block">
	  	{!! Form::open(['method' => 'post', 'action' => 'Atelier\ProjectController@submit']) !!}
        <div class="form-group row @if($errors->has('name')) has-error @endif">
          <label class="col-sm-2 text-right">项目名<span><i class="i-required">*</i></span></label>
          <div class="col-sm-10">
            {!! Form::text('name', $project == null ? null : $project->name, ['class' => 'form-control']) !!}
	          @if ($errors->has('name'))
	            <p class="help-block">{{ $errors->first('name') }}</p>
	          @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 text-right">项目介绍</label>
          <div class="col-sm-10">
            {!! Form::textarea('introduce', $project == null ? null : $project->introduce, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="form-group row @if($errors->has('url')) has-error @endif">
          <label class="col-sm-2 text-right">连接</label>
          <div class="col-sm-10">
            {!! Form::text('url', $project == null ? null : $project->url, ['class' => 'form-control']) !!}
	          @if ($errors->has('url'))
	            <p class="help-block">{{ $errors->first('url') }}</p>
	          @endif
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