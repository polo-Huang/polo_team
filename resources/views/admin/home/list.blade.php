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
  <li><a href="{{ url('/admin') }}">主页</a></li>
  <li class="active">个人主页</li>
</ol>
</section>
<div class="inside home-list">
  @foreach($list as $key => $value)
    <div class="col-md-3">
      <div class="card card-white">
        <img class="card-img-top img-contain height-200" title="test1" src="{{ $value->cover_photo != null ? $value->cover_photo : '/image/programmer-cover.png' }}" alt="Card image">
        <div class="card-block text-center">
          <h4 class="card-title">{{ $value->name }}</h4>
          <p class="card-text">{{ $value->title }}</p>
          <a href="{{ url('/admin/home/details/'.$value->id) }}" class="btn btn-primary">详情</a>
        </div>
      </div>
    </div>
  @endforeach
  <div class="clearfix"></div>
</div>
@endsection