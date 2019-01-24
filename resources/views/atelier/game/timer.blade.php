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
  <li><a href="{{ url('/atelier/game/cards') }}">cards</a></li>
  <li class="active">计时器</li>
</ol>
</section>

<div class="inside game-test">
	<div class="lottery-draw-btn bg-color-white" style="width: calc(100% - 100px); margin: 50px; text-align: center;  padding-top: 50px; padding-bottom: 50px; cursor: pointer;">戳这里👇开始计时</div>
</div>
@endsection