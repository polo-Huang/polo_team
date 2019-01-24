@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('link')
  <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
@endsection

@section('after_link')
@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/atelier/index') }}">工作室</a></li>
  <li><a href="{{ url('/atelier/game/cards') }}">cards</a></li>
  <li class="active">{{ $game == null ? '添加' : '编辑' }}项目</li>
</ol>
</section>

<div class="inside project-list">
	<div class="card card-white mb-20-ipt">
	  <div class="card-header">
	    <h4 class="px-10">{{ $game == null ? '添加' : '编辑' }}项目&nbsp;<span>#{{ $game->id }}</span></h4>
	  </div>
	  <div class="card-block">
	  	{!! Form::open(['method' => 'post', 'action' => 'Atelier\GameController@submit']) !!}
        <div class="form-group">
          {!! Form::hidden('id', $game == null ? null : $game->id) !!}
        </div>
        <div class="form-group row @if($errors->has('name')) has-error @endif">
          <label class="col-md-2 col-lg-1 text-right"><span><i class="i-required">*</i></span>名称</label>
          <div class="col-md-10 col-lg-11">
            {!! Form::text('name', $game == null ? null : $game->name, ['class' => 'form-control']) !!}
	          @if ($errors->has('name'))
	            <p class="help-block">{{ $errors->first('name') }}</p>
	          @endif
          </div>
        </div><div class="form-group row @if($errors->has('type')) has-error @endif">
          <label class="col-md-2 col-lg-1 text-right">类型</label>
          <div class="col-md-10 col-lg-11">
            {!! Form::text('type', $game == null ? null : $game->type, ['class' => 'form-control']) !!}
            @if ($errors->has('type'))
              <p class="help-block">{{ $errors->first('type') }}</p>
            @endif
          </div>
        </div>
        <div class="form-group row @if($errors->has('url')) has-error @endif">
          <label class="col-md-2 col-lg-1 text-right">连接</label>
          <div class="col-md-10 col-lg-11">
            {!! Form::text('url', $game == null ? null : $game->url, ['class' => 'form-control']) !!}
            @if ($errors->has('url'))
              <p class="help-block">{{ $errors->first('url') }}</p>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-lg-1"></div>
          <div class="col-md-10 col-lg-11"><input type="submit" value="提交" class="btn btn-success"></div>
        </div>
      {!! Form::close() !!}
      <div class="clearfix"></div>
	  </div>
	</div>
</div>
@endsection