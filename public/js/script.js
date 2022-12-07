$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add_button').on('click', function(){
        $('.tabs').css('opacity', 1);
    });
    $('.animal_tab').on('click', function(){
        let animal_kind = $(this).data('id');
        $.ajax({
            url: "/create",
            method: 'post',
            data: {'animal_kind': animal_kind},
            success: function(responce){
               $('.main_window').html('<img src=" /images/pictures/'+responce+'">');
            }
        })
    });
});