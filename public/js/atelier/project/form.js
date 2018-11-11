$(document).ready(function() {
  $("#select2-members").select2({
    placeholder:'选择成员',
  });
  $("#select2-members").each(function(){
    if ($(this).attr('data-tags') == 'true') {
      var dataIndex = $(this).attr('data-index');
      if (dataIndex != '') {
        var data = dataIndex.split(',');
        console.log(data);
        console.log($(this).attr('class'));
        $(this).val(data).trigger("change");
      }
    }
	});
});