@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('link')

@endsection

@section('after_link')
  <script src="{{ asset('tablesorter/jquery.tablesorter.js') }}"></script>
	<script src="{{ asset('/js/atelier/project/tasks.js') }}"></script>
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
			<li><a href="{{ url('/atelier/project/tasks/'.$project->id) }}">任务</a></li>
			<li><a href="{{ url('/atelier/project/details/'.$project->id) }}">详情</a></li>
			<li><a href="{{ url('/atelier/project/taskForm/'.$project->id) }}">添加任务</a></li>
		</ol>
	</section>
	<h4 class="mb-20">项目</h4>

	<div>
		<table class="table">
			<thead>
				<tr>
					<th class="thSort @if($searchData['sort'] == 'id'){{ $searchData['order'] }}@endif"><a href="{{ url('/atelier/project/tasks/'.$project->id.'?sort=id&order='.($searchData['sort'] == 'id' ? ($searchData['order'] == 'desc' ? 'asc' : 'desc') : 'desc')) }}">#</a></th>
					<th class="thSort @if($searchData['sort'] == 'type'){{ $searchData['order'] }}@endif"><a href="{{ url('/atelier/project/tasks/'.$project->id.'?sort=type&order='.($searchData['sort'] == 'type' ? ($searchData['order'] == 'desc' ? 'asc' : 'desc') : 'desc')) }}">分类</a></th>
					<th class="thSort @if($searchData['sort'] == 'status'){{ $searchData['order'] }}@endif"><a href="{{ url('/atelier/project/tasks/'.$project->id.'?sort=status&order='.($searchData['sort'] == 'status' ? ($searchData['order'] == 'desc' ? 'asc' : 'desc') : 'desc')) }}">状态</a></th>
					<th class="thSort @if($searchData['sort'] == 'priority'){{ $searchData['order'] }}@endif"><a href="{{ url('/atelier/project/tasks/'.$project->id.'?sort=priority&order='.($searchData['sort'] == 'priority' ? ($searchData['order'] == 'desc' ? 'asc' : 'desc') : 'desc')) }}">优先级</a></th>
					<th>标题</th>
					<th class="thSort @if($searchData['sort'] == 'receiver_id'){{ $searchData['order'] }}@endif"><a href="{{ url('/atelier/project/tasks/'.$project->id.'?sort=receiver_id&order='.($searchData['sort'] == 'receiver_id' ? ($searchData['order'] == 'desc' ? 'asc' : 'desc') : 'desc')) }}">指派给</a></th>
					<th class="thSort @if($searchData['sort'] == 'start_date'){{ $searchData['order'] }}@endif"><a href="{{ url('/atelier/project/tasks/'.$project->id.'?sort=start_date&order='.($searchData['sort'] == 'start_date' ? ($searchData['order'] == 'desc' ? 'asc' : 'desc') : 'desc')) }}">开始日期</a></th>
					<th class="thSort @if($searchData['sort'] == 'updated_at'){{ $searchData['order'] }}@endif"><a href="{{ url('/atelier/project/tasks/'.$project->id.'?sort=updated_at&order='.($searchData['sort'] == 'updated_at' ? ($searchData['order'] == 'desc' ? 'asc' : 'desc') : 'desc')) }}">更新于</a></th>
				</tr>
			</thead>
			<tbody>
				@if (count($tasks) > 0)
					@foreach ($tasks as $key => $task)
					<tr>
						<td>{{ $task->id }}</td>
						<td>{{ $task->type }}</td>
						<td>{{ trans('options.task_status_'.$task->status) }}</td>
						<td>{{ trans('options.task_priority_'.$task->priority) }}</td>
						<td><a href="{{ url('/atelier/project/task/'.$task->id) }}">{{ $task->title }}</a></td>
						<td>{{ $task->receiver_id != null ? $task->receiver->name : '' }}</td>
						<td>{{ date('Y-m-d', strtotime($task->start_date)) }}</td>
						<td>{{ $task->updated_at }}</td>
					</tr>
					@endforeach
				@else
					<tr>
						<td colspan="8">没有任务</td>
					</tr>
				@endif
			</tbody>
		</table>
		<div class="card-footer text-right">{!! $tasks->links() !!}</div>
	</div>
</div>
@endsection