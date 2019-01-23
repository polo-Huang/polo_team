@extends('layouts.header')

@section('title')
  首页
@endsection

@section('link')
  <meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('after_link')
  <script src="{{ asset('js/exchange.js') }}?1"></script>
@endsection

@section('content')
<div class="container exchange mt-20 mb-100">
  {!! Form::open(['method' => 'get', 'action' => 'HomeController@exchangeCalculate']) !!}
  <h2><span class="unit">100</span> <span class="currencyFromTitle">港币（HKD）</span> = <span class="buyPic">{{ 100 * $data['buyPic'] }}</span> <span class="currencyToTitle">人民币（CNY）</span></h2>
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
      <button class="btn-switch btn btn-primary w-100 mb-15"><i class="fa fa-exchange"></i></button>
    </div>
    <div class="col-md-4">
      <select name="currencyTo" class="form-control">
        <option value="CNY" selected="true">人民币（CNY）</option>
        <option value="HKD">港币（HKD）</option>
        <option value="USD">美元（USD）</option>
      </select>
    </div>
    <div class="col-md-1">
      <input type="submit" class="btn btn-success form-control" value="转换">
    </div>
  </div>
  {!! Form::close() !!}
  <div>
    <table class="table text-center">
      <thead>
        <tr>
          <th class="text-center">单位</th>
          <th class="text-center">货币</th>
          <th class="text-center">兑换</th>
          <th class="text-center">货币</th>
        </tr>
      </thead>
      <tbody>
        <tr class="exchange-group" data-currency-from="HKD" data-currency-from-title="港币（HKD）" data-currency-to="CNY" data-currency-to-title="人民币（CNY）" data-unit="1">
          <td><span class="exchange-unit">加载中...</span></td>
          <td><span class="exchange-currency-from">加载中...</span></td>
          <td><span class="exchange-result">加载中...</span></td>
          <td><span class="exchange-currency-to">加载中...</span></td>
        </tr>
        <tr class="exchange-group" data-currency-from="USD" data-currency-to="CNY" data-currency-from-title="美元（USD）" data-currency-to-title="人民币（CNY）" data-unit="1">
          <td><span class="exchange-unit">加载中...</span></td>
          <td><span class="exchange-currency-from">加载中...</span></td>
          <td><span class="exchange-result">加载中...</span></td>
          <td><span class="exchange-currency-to">加载中...</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@include('layouts.footer')
@endsection
