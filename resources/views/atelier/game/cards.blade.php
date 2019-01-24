@extends('layouts.atelier.header')

@section('title')
  测试&游戏
@endsection

@section('link')

@endsection

@section('after_link')

@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/atelier/index') }}">atelier</a></li>
  <li class="active">测试&游戏</li>
</ol>
<div class="px-15 mb-10">
  <a href="{{ url('/atelier/game/form') }}">创建</a>
</div>
</section>
<div class="inside home-list">
	@foreach($games as $key => $game)
	<div class="col-md-3">
	  <div class="card card-white">
	  	@if (null != $game->url)
	  	<a href="{{ $game->url }}">
	    	<img class="card-img-top img-contain height-200" title="test1" src="{{ '/image/programmer-cover.png' }}" alt="Card image">
	    </a>
	    @else
	    <img class="card-img-top img-contain height-200" title="test1" src="{{ '/image/programmer-cover.png' }}" alt="Card image">
	    @endif
	    <div class="card-block text-center">
	      <h4 class="card-title">{{ $game->name }}</h4>
	      <p class="card-text">{{ $game->type }}</p>
	      <a href="{{ url('/atelier/game/form/'.$game->id) }}" class="btn btn-primary">编辑</a>
	      @if (null != $game->url)
	      <a href="{{ $game->url }}" class="btn btn-primary">进入</a>
	      @endif
	    </div>
	  </div>
	</div>
	@endforeach
  <div class="clearfix"></div>
</div>
@endsection