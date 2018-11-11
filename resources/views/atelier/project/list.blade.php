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
  <li class="active">项目</li>
</ol>
</section>

<div class="inside project-list">
	<section>
		<ol class="action-btn-group">
			<li><a href="{{ url('/atelier/project/form') }}">添加项目</a></li>
			<li><a href="{{ url('/atelier/clock/checkOutView') }}">下班</a></li>
		</ol>
	</section>
	<h4 class="mb-20">项目</h4>

	<div>
		@if (count($projects) > 0)
		<div>
			<dl>
				@foreach ($projects as $key => $project)
				<dd><a class="a-project" href="{{ url('/atelier/project/tasks/'.$project->id) }}">{{ $project->name }}</a></dd>
				@endforeach
			</dl>
		</div>
		@else
		<div>
			<p class="help-block">没有项目</p>
		</div>
		@endif
	</div>
</div>
@endsection