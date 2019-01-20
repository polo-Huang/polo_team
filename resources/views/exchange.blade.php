@extends('layouts.header')

@section('title')
  首页
@endsection

@section('link')
  <!-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> -->
@endsection

@section('after_link')
  <script type="text/javascript">
    $(document).ready(function() {
      // console.log('1');
      var unit = $('input[name=unit]').val();
      $('form').ajaxForm({
        beforeSend: function(){
          //提交表單前的操作
          $('span.unit').html(unit);
          $('span.currencyFromTitle').html($('input[name=currencyFrom]').val());
          $('span.buyPic').html('加载中...');
          $('span.currencyToTitle').html($('input[name=currencyTo]').val());
        },
        success:function(result){
          var result = JSON.parse(result);//将data转为JSON数据
          if (result.success) {
            //正确操作
            var data = result.data;
            $('span.buyPic').html(data.buyPic * unit);
          } else {
            //错误操作
            alert(result.error);
          }
        },
        //完成后恢复按钮
        complete: function() {
          
        }
      });
    });
  </script>
@endsection

@section('content')
<div class="container exchange mt-20 mb-100">
  {!! Form::open(['method' => 'get', 'action' => 'HomeController@exchangeCalculate']) !!}
  <h2><span class="unit">100</span> <span class="currencyFromTitle">港币</span>(<span class="currencyFromName">HKD</span>) = <span class="buyPic">{{ 100 * $data['buyPic'] }}</span> <span class="currencyToTitle">人民币</span>(<span class="currencyToName">CNY</span>)</h2>
  <div class="row">
    <div class="col-md-2">
      <input type="number" name="unit" class="form-control" placeholder="单位" value="100">
    </div>
    <div class="col-md-4">
      <select name="currencyFrom" class="form-control">
        <option value="CNY">人民币（CNY）</option>
        <option value="HKD" selected="true">港币（HKD）</option>
        <option value="USD">美元（USD）</option>
      </select>
    </div>
    <div class="col-md-1">
      <button class="btn-switch btn btn-default w-100"><i class="fa fa-exchange"></i></button>
    </div>
    <div class="col-md-4">
      <select name="currencyTo" class="form-control">
        <option value="CNY" selected="true">人民币（CNY）</option>
        <option value="HKD">港币（HKD）</option>
        <option value="USD">美元（USD）</option>
      </select>
    </div>
    <div class="col-md-1">
      <input type="submit" class="btn btn-primary form-control" value="转换">
    </div>
  </div>
  {!! Form::close() !!}
</div>
@include('layouts.footer')
@endsection
