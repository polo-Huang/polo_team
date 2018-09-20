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
  <li class="active">{{ $project->name }}</li>
</ol>
</section>

<div class="inside project-list">
	<section>
		<ol class="action-btn-group">
			<li><a href="{{ url('/atelier/project/form/'.$project->id) }}">编辑</a></li>
			<li><a href="javascript:void(0);">工作时长</a></li>
		</ol>
	</section>
	<h4 class="mb-20">{{ $project->name }}</h4>

	<div>
		{{ $project->introduce }}
	</div>
</div>
@endsection