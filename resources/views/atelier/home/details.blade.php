@extends('layouts.admin.header')

@section('title')
  个人主页
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
  <li class="active">详情</li>
</ol>
</section>
<div class="inside home-details">
  <div class="card card-white mb-20-ipt">
    <div class="card-header">
      <h4 class="px-10">{{ $home->user_id == null ? '团队主页' : $home->name.' 的主页' }}<a href="{{ url('/'.$home->user_id) }}" class="float-right">查看主页</a></h4>
    </div>
    <div class="card-block">
      <div class="col-md-4 mt-50">
        {!! Form::open(['name' => 'form_basic_profile', 'method' => 'post', 'action' => 'Admin\HomeController@editBasicProfile']) !!}
          {!! Form::hidden('id', $home->id) !!}
          <div class="form-group @if($errors->has('name')) has-error @endif">
            {!! Form::text('name', $home->name, ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
              <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
          </div>
          <div class="form-group @if($errors->has('title')) has-error @endif">
            {!! Form::text('title', $home->title, ['class' => 'form-control']) !!}
            @if ($errors->has('title'))
              <p class="help-block">{{ $errors->first('title') }}</p>
            @endif
          </div>
          <div class="form-group @if($errors->has('introduce')) has-error @endif">
            {!! Form::textarea('introduce', $home->introduce, ['class' => 'form-control']) !!}
            @if ($errors->has('introduce'))
              <p class="help-block">{{ $errors->first('introduce') }}</p>
            @endif
          </div>
          <input type="submit" value="提交" class="btn btn-success">
        {!! Form::close() !!}
      </div>
      <div class="col-md-8">
        <div class="img-click-upload">
          {!! Form::open(['name' => 'form_upload_cover', 'method' => 'post', 'action' => 'Admin\HomeController@uploadCoverPhoto', 'files' => 'true']) !!}
            {!! Form::hidden('id', $home->id) !!}
            <div class="btn-upload">
              <span>点击上传</span>
              {!! Form::file('cover_photo') !!}
            </div>
            <img name="cover_photo" class="img-contain height-400 mb-20" src="{{ $home->cover_photo != null ? $home->cover_photo : '/image/programmer-cover.png' }}" alt="Card image">
          {!! Form::close() !!}
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="card card-white">
        <div class="card-header">
          <h4 class="px-10">关于<a href="{{ url('/'.$home->user_id.'#about') }}" class="float-right">查看</a></h4>
        </div>
        <div class="card-block">
          <textarea class="form-control" name="introduce" rows="10">{{ $home->about }}</textarea>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-white">
        <div class="card-header">
          <h4 class="px-10">服务<a href="{{ url('/'.$home->user_id.'#service') }}" class="float-right">查看</a></h4>
        </div>
        <div class="card-block">
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-white">
        <div class="card-header">
          <h4 class="px-10">项目<a href="{{ url('/'.$home->user_id.'#portfolio') }}" class="float-right">查看</a></h4>
        </div>
        <div class="card-block text-center">
          <a href="{{ url('/admin/project/list') }}"><i class="fa fa-cubes font-size-150"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card card-white">
        <div class="card-header">
          <h4 class="px-10">公司<a href="{{ url('/'.$home->user_id.'#company') }}" class="float-right">查看</a></h4>
        </div>
        <div class="card-block">
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-white">
        <div class="card-header">
          <h4 class="px-10">联系方式<a href="{{ url('/'.$home->user_id.'#contact') }}" class="float-right">查看</a></h4>
        </div>
        <div class="card-block">
          <input class="form-control" type="text" name="name" value="{{ $home->address }}">
          <input class="form-control" type="text" name="title" value="{{ $home->phone }}">
          <input class="form-control" type="text" name="title" value="{{ $home->email }}">
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection