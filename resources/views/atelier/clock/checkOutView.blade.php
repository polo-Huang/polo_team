@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('link')
  <meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('after_link')
	<script type="text/javascript">
		$(".clock-div span").click(function(){
			console.log('click');

      $.ajaxSetup({//配合页面的<meta name="_token" content="{!! csrf_token() !!}"/>达到使用ajax的post方法
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
        type:'post',
        url: '/atelier/clock/checkOut',
        dataType:'json',
        success:function(result){
          if (result.success) {
            location.href = result.returnUrl;
          } else {
            alert(result.error);
          }
        }
      });
    });
	</script>
@endsection

@section('content')
<section>
<ol class="breadcrumb">
  <li><a href="{{ url('/atelier/index') }}">工作室</a></li>
  <li class="active">下班</li>
</ol>
</section>

<div class="inside clock-index">
	<div class="clock-div clock-btn">
		<span>
			<i class="fa fa-hand-pointer-o"></i>
		</span>
	</div>
</div>
@endsection