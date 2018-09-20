@extends('layouts.admin.header')

@section('title')
  图片
@endsection

@section('link')

@endsection

@section('after_link')

@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/admin') }}">主页</a></li>
  <li class="active">图片列表</li>
</ol>
</section>
<div class="inside image-list">
  <div class="row">
    @for($i = 1; $i <= 4; $i++)
    <div class="col-xs-6 col-md-4 col-lg-3"><img src="{{ url('/image/image-'.$i.'.png') }}"></div>
    @endfor
  </div>
</div>
@endsection