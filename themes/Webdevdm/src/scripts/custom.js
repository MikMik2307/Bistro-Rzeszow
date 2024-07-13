var page = 2;
jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'load_range_by_ajax',
            'page': page,
            'security': range.security
        };

        $.post(range.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.range-posts').append(response);
                page++;
            } else {
                $('.cab-row-loadmore').hide();
            }
        });
    });
});
