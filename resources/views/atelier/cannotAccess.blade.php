@extends('layouts.atelier.header')

@section('title')
  无法访问
@endsection

@section('content')
<div class="cannotAccess">
	<div class="my-50 text-center">
		<p class="h1">{{ trans('errors.'.$error) }}</p>
		<br>
		<a class="cursor-pointer" href="javascript:history.back()">返回</a>
	</div>
</div>
@endsection