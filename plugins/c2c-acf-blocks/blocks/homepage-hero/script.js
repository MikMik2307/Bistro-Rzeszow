jQuery( document ).ready( function( $ ) {
    $('.tile-single-txt-container').hover(
        function() {
            // Mouse over
            $(this).css('background-color', $(this).data('hover-color'));
        },
        function() {
            // Mouse out
            $(this).css('background-color', '#fff'); // Default color on mouse out
        }
    );
});
