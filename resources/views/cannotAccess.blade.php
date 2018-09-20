@extends('layouts.header')

@section('title')
  无法访问
@endsection

@section('content')
<div class="cannotAccess container">
	<div class="my-50 text-center">
		<p class="h1">{{ trans('errors.'.$error) }}</p>
		<br>
		<a class="cursor-pointer" onclick="">点击刷新</a>
	</div>
</div>
@include('layouts.footer')
@endsection