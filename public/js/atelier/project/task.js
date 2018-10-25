var taskId = $('input[name=task_id]').val();
var projectId = $('input[name=project_id]').val();

$(document).ready(function() {
	$('.change-status-btn').click(function() {
		var status = $(this).attr('status');
		console.log(taskId);
		$.ajaxSetup({//配合页面的<meta name="_token" content="{!! csrf_token() !!}"/>达到使用ajax的post方法
      headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type:'post',
      url: '/atelier/project/changeTaskStatus',
      data:{id:taskId, status:status},
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

  $('.delete-btn').click(function() {
    if (confirm($("input[name=confirm_transferred]").val())) {//弹窗提示获取true执行一下步骤
      $.ajaxSetup({//配合页面的<meta name="_token" content="{!! csrf_token() !!}"/>达到使用ajax的post方法
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
      });

      $.ajax({
        type:'post',
        url: '/atelier/project/deleteTask',
        data:{id:taskId},
        dataType:'json',
        success:function(result){
          console.log(result);
          if (!result.success) {
            alert(result.error);
          }
          location.href = '/atelier/project/tasks/' + projectId;
        }
      });
    }
  });
});