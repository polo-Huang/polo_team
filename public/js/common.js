$(document).ready(function(){
    $('.btn-toggle-sidebar').click(function(){
        sidebarLeft = $('.sidebar').css('left');
        //当sidebarLeft等于0时则为open
        if (sidebarLeft == '0px') {
            $('body').addClass('sidebar-close');
            $('body').removeClass('sidebar-open');
        } else {
            $('body').addClass('sidebar-open');
            $('body').removeClass('sidebar-close');
        }
    });

    $('input[name=cover_photo]').on('change', function(){
      $('form[name=form_upload_cover]').submit();
    });
});