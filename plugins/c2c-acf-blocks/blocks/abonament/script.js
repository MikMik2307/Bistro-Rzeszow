jQuery( document ).ready( function( $ ) {

    function SetStartingStep(){
        let startingStep = $(".step-1")
        startingStep.addClass("step-active");
    }
    SetStartingStep();
    // $('.next').on('click', function() {
    //     var allFilled = true;
    //
    //     // Iterate over each input with the class 'required'
    //     $('#form-deliver-details .required').each(function() {
    //         if ($(this).val() === '') {
    //             allFilled = false;
    //             $(this).css('border', '2px solid red'); // Optional: Add red border to highlight empty fields
    //         } else {
    //             $(this).css('border', ''); // Remove border if field is filled
    //         }
    //     });
    //     if (allFilled) {
    //         // All required fields are filled
    //         // Proceed with your onclick code here
    //         alert('All required fields are filled. Proceeding...');
    //     } else {
    //         // Some required fields are empty
    //         alert('Please fill all required fields.');
    //     }
    // });
    $('.next').on('click', function() {
        // Find the current fieldset
        var currentFieldset = $(this).closest('fieldset');

        // Hide the current fieldset
        currentFieldset.hide();

        // Show the next fieldset
        currentFieldset.next('fieldset').show();

        // Scroll to #wp-block-cab-abonament section
        $('html, body').animate({
            scrollTop: $('#wp-block-cab-abonament').offset().top
        }, 800); // Adjust scroll speed as needed
    });

    // Previous button click handler
    $('.back').on('click', function() {
        var currentFieldset = $(this).closest('fieldset');
        currentFieldset.hide();
        currentFieldset.prev('fieldset').show();

        // Scroll to #wp-block-cab-abonament section
        $('html, body').animate({
            scrollTop: $('#wp-block-cab-abonament').offset().top
        }, 800); // Adjust scroll speed as needed

    });
    $('#24').on('click', function() {
        // Function to set a cookie
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                let date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }

        // Set a session cookie (expires when the browser is closed)
        setCookie('Selected_product', '24');
        $('#24').addClass('Selected-Product');
    });
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for(let i=0;i < ca.length;i++) {
            let c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    function applyActiveClass() {
        let currentCookie = getCookie('Selected_Product');
        $('li').removeClass('selected-product-active'); // Remove active class from all divs
        if (currentCookie) {
            $('#' + currentCookie).addClass('selected-product-active'); // Add active class to the div with the id equal to the cookie value
        }
    }
    $('.product-single').on('click', function() {
        let divId = $(this).attr('id');
        setCookie('Selected_Product', divId);
        applyActiveClass();

        // Optionally, you can log the cookie value to confirm it's set
        console.log('Cookie set: ' + document.cookie);
    });
    applyActiveClass();
});
