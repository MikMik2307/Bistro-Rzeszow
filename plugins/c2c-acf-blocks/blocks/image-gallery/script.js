jQuery(document).ready(function($) {
    // Append lightbox container to body
    $('body').append('<div id="lightbox" style="display:none;"><span class="close">&times;</span><img class="lightbox-content" src=""></div>');

    // When an image in the gallery is clicked
    $('.photo-gallery').on('click', '.gallery-item', function(event) {
        event.preventDefault();

        var imgSrc = $(this).attr('href');

        // Show the lightbox
        $('#lightbox').show();
        $('#lightbox .lightbox-content').attr('src', imgSrc);
    });

    // Close the lightbox when the close button is clicked
    $('#lightbox').on('click', '.close', function() {
        $('#lightbox').hide();
    });

    // Close the lightbox when clicking outside the image
    $(document).on('click', function(event) {
        if ($(event.target).is('#lightbox')) {
            $('#lightbox').hide();
        }
    });
});
