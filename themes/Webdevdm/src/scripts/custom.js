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

document.addEventListener('DOMContentLoaded', function () {
    // Add click event listener to lightbox images
    document.addEventListener('click', function (event) {
        if (event.target.matches('.lightbox img')) {
            // Close the lightbox
            lightbox.end();
        }
    });
});