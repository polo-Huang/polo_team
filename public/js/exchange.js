// 保留四位小数
function setNumResult(num) {
  var str = String(num);
  var index = str.lastIndexOf(".");
  decimal = str.substring(index + 1, str.length);
  if (decimal.length > 4) {
      numResult = parseFloat(num).toFixed(4);
  } else {
      numResult = parseFloat(num);
  }
  return numResult;
}
function getExchange(exchangeGroup) {
	var unit = exchangeGroup.attr('data-unit');
	var currencyFrom = exchangeGroup.attr('data-currency-from');
  var currencyTo = exchangeGroup.attr('data-currency-to');
	var currencyFromTitle = exchangeGroup.attr('data-currency-from-title');
  var currencyToTitle = exchangeGroup.attr('data-currency-to-title');

  $.ajaxSetup({//配合页面的<meta name="_token" content="{!! csrf_token() !!}"/>达到使用ajax的post方法
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });
	$.ajax({
    type:'get',
    url: '/exchangeCalculate',
    data:{currencyFrom:currencyFrom, currencyTo:currencyTo},
    dataType:'json',
    success:function(result){
      // var result = JSON.parse(result);//将data转为JSON数据
      if (result.success) {
        //正确操作
        var data = result.data;
        exchangeGroup.find('span.exchange-unit').html(unit);
        exchangeGroup.find('span.exchange-currency-from').html(currencyFromTitle);
        exchangeGroup.find('span.exchange-result').html(setNumResult(data.buyPic * unit));
        exchangeGroup.find('span.exchange-currency-to').html(currencyToTitle);
      } else {
        //错误操作
        alert(result.error);
      }
    }
  });
}
$(document).ready(function() {
  // console.log('1');
  $('.exchange-group').each(function() { getExchange($(this)) });

  var unit = $('input[name=unit]').val();
  $('form').submit(function() {
    unit = $('input[name=unit]').val();
  });
  $('form').ajaxForm({
    beforeSend: function(){
      //提交表單前的操作
      $('span.unit').html(unit);
      $('span.currencyFromTitle').html($('select[name=currencyFrom] option:selected').text());
      $('span.buyPic').html('加载中...');
      $('span.currencyToTitle').html($('select[name=currencyTo] option:selected').text());
    },
    success:function(result){
      var result = JSON.parse(result);//将data转为JSON数据
      if (result.success) {
        //正确操作
        var data = result.data;
        $('span.buyPic').html(setNumResult(data.buyPic * unit));
      } else {
        //错误操作
        alert(result.error);
      }
    },
    //完成后恢复按钮
    complete: function() {
      
    }
  });

  $('.btn-switch').click(function() {
  	var currencyFrom = $('select[name=currencyFrom]');
  	var currencyTo = $('select[name=currencyTo]');
  	var median = currencyFrom.val();
  	currencyFrom.val(currencyTo.val());
  	currencyTo.val(median);
  });
});