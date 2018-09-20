@extends('layouts.atelier.header')

@section('title')
  test
@endsection

@section('link')

@endsection

@section('after_link')
	<script src="{{ asset('js/atelier/game/test.js') }}"></script>
@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/atelier/index') }}">atelier</a></li>
  <li class="active">{{ 'test' }}</li>
</ol>
</section>

<div class="inside game-test">
	<h2>{{ $game->name }}</h2>

	<div class="lottery-draw-btn bg-color-white" style="width: calc(100% - 100px); margin: 50px; text-align: center;  padding-top: 50px; padding-bottom: 50px; cursor: pointer;">戳这里👇</div>
	{!! Form::open(['method' => 'post', 'action' => 'Atelier\GameController@submit']) !!}
	{!! Form::hidden('game_id', $game->id) !!}
	{!! Form::hidden('result') !!}
	{!! Form::hidden('level') !!}
	{!! Form::close() !!}

	<h3>👇次数：{{ count($gameResults) }}</h3>
	<table class="table">
		<thead>
			<tr>
				<th>顺序</td>
				<th>结果</td>
				<th>级别</td>
				<th>👇时间</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($gameResults as $key => $gameResult)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $gameResult->result }}</td>
				<td>{{ $gameResult->level }}</td>
				<td>{{ $gameResult->created_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>
@endsection