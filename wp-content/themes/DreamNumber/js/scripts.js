jQuery(document).ready(function($){
    $("#keyword").keyup(function(){
        var keyword = $(this).val();
        if(keyword){
            $.ajax({
                url: frontend_ajax_object.ajaxurl,
                type: 'post',
                dataType: 'json',
                data: { action: 'data_fetch', keyword: keyword },
                success: function(data) {
                    $('#datafetch').html( data );
                }
            })
        }
    });
    $('.cat-list_item').on('click', function () {
        $('.cat-list_item').removeClass('active');
        $(this).addClass('active');

        $.ajax({
            type: 'POST',
            url: frontend_ajax_object.ajaxurl,
            dataType: 'json',
            data: {
                action: 'filter_projects',
                category: $(this).data('slug'),
            },
            success: function (response) {
                $('.project-tiles').html(response.htm);
            }
        })
    });
});