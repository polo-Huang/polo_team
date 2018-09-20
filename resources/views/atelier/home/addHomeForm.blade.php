@extends('layouts.admin.header')

@section('title')
  新的个人主页
@endsection

@section('link')

@endsection

@section('after_link')

@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/admin/index') }}">主页</a></li>
  <li><a href="{{ url('/admin/home/list') }}">个人主页</a></li>
  <li class="active">新的个人主页</li>
</ol>
</section>
<div class="inside home-details">
  <div class="card card-white mb-20-imp">
    <div class="card-header">
      <h4 class="px-10">新的个人主页</h4>
    </div>
    <div class="card-block">
      {!! Form::open(['name' => 'form_basic_profile', 'method' => 'post', 'action' => 'Admin\HomeController@editBasicProfile']) !!}
        <div class="form-group row @if($errors->has('name')) has-error @endif">
          <label class="col-sm-2 text-right">昵称</label>
          <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
          @if ($errors->has('name'))
            <p class="help-block">{{ $errors->first('name') }}</p>
          @endif
        </div>
        <div class="form-group row @if($errors->has('title')) has-error @endif">
          <label class="col-sm-2 text-right">标语</label>
          <div class="col-sm-10">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
          </div>
          @if ($errors->has('title'))
            <p class="help-block">{{ $errors->first('title') }}</p>
          @endif
        </div>
        <div class="form-group row @if($errors->has('introduce')) has-error @endif">
          <label class="col-sm-2 text-right">自我介绍</label>
          <div class="col-sm-10">
            {!! Form::textarea('introduce', null, ['class' => 'form-control']) !!}
          </div>
          @if ($errors->has('introduce'))
            <p class="help-block">{{ $errors->first('introduce') }}</p>
          @endif
        </div>
        <div class="form-group row @if($errors->has('about')) has-error @endif">
          <label class="col-sm-2 text-right">详细</label>
          <div class="col-sm-10">
            {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
          </div>
          @if ($errors->has('about'))
            <p class="help-block">{{ $errors->first('about') }}</p>
          @endif
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