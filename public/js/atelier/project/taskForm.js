$(document).ready(function() {
	//日期
    $('input[name=start_date]').datetimepicker({
        format:'yyyy-mm-dd',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    $('#summernote').summernote({height: 300,});
});