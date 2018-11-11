@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('link')
  <meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('after_link')
@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/atelier/index') }}">工作室</a></li>
  <li class="active">打卡成功</li>
</ol>
</section>

<div class="inside clock-index">
	<div class="clock-div">
		<span>
			<i class="fa fa-check"></i>
		</span>
	</div>
  <p class="text-center"><a href="/atelier/project/list">项目列表</a></p>
</div>
@endsection