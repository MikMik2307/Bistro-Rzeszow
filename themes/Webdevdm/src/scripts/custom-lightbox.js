document.addEventListener('DOMContentLoaded', function () {
    // Add click event listener to lightbox images
    document.addEventListener('click', function (event) {
        if (event.target.matches('.lightbox img')) {
            // Close the lightbox
            lightbox.end();
        }
    });
});