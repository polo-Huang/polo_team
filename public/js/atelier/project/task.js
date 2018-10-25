var id = $('input[name=id]').val();

$(document).ready(function() {
	$('.change-status-btn').click(function() {
		var status = $(this).attr('status');
		console.log(status);
		$.ajaxSetup({//配合页面的<meta name="_token" content="{!! csrf_token() !!}"/>达到使用ajax的post方法
      headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type:'post',
      url: '/atelier/project/changeTaskStatus',
      data:{id:id, status:status},
      dataType:'json',
      success:function(result){
      	console.log(result);
        if (!result.success) {
          alert(result.error);
        }
        location.reload();
      }
    });
	});
});