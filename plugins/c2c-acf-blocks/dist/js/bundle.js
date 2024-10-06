/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ 74:
/***/ (() => {

jQuery(document).ready(function ($) {
  // Function to set a cookie
  function setCookie(name, value, days) {
    let expires = "";
    if (days) {
      let date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    // Log the cookie details for debugging
    console.log('Setting cookie:', name, '=', value, expires);
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  // Function to get a cookie value
  function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  // Function to extract numbers from a string
  function extractNumbers(str) {
    return str.replace(/\D/g, ''); // Remove non-digit characters
  }
  // Function to handle the day duration

  // Function to handle the day duration
  function setDayDurationCookie() {
    var dayDuration = $('#day_duration').text().trim(); // Ensure to trim any extra spaces
    console.log('Raw day duration text:', dayDuration); // Log the raw text

    var numericDayDuration = extractNumbers(dayDuration);
    console.log('Extracted numeric value:', numericDayDuration); // Log the numeric value

    if (numericDayDuration) {
      // Check if numeric value is not empty
      setCookie('Day_Duration', numericDayDuration);
    } else {
      console.error('No numeric value found for Day_Duration cookie.');
    }
  }

  // Function to apply the active class based on the cookie value
  function applyActiveClassProduct() {
    let currentCookie = getCookie('Selected_Product');
    $('li').not('.selected-product-checkout').removeClass('selected-product-active'); // Remove active class from all items
    if (currentCookie) {
      $('#' + currentCookie).addClass('selected-product-active'); // Add active class to the item with the id equal to the cookie value
    }
  }

  function applyActiveClassProductTime() {
    let currentCookie = getCookie('Selected_Product_Time');
    // Remove active class from all items that don't have the class 'product-time-variation-checkout'
    $('li').not('.product-time-variation-checkout').removeClass('product-time-variation-active');
    if (currentCookie) {
      $('#' + currentCookie).addClass('product-time-variation-active'); // Add active class to the item with the id equal to the cookie value
    }
  }

  function applyActiveClassProductWeekend() {
    let currentCookie = getCookie('Selected_Product_Weekend');
    $('.weekend-checkbox').removeClass('weekend-checkbox-active'); // Remove active class from all checkboxes
    if (currentCookie) {
      $('#' + currentCookie).addClass('weekend-checkbox-active'); // Add active class to the checkbox with the id equal to the cookie value
    }
  }

  // Function to navigate to the next fieldset
  function navigateToNextFieldset(currentFieldset) {
    var $currentFieldset = $(currentFieldset);
    $currentFieldset.hide();
    $currentFieldset.next('fieldset').show();
    updateProgressBar(); // Update progress bar when navigating to the next fieldset

    // Scroll to #wp-block-cab-abonament section
    $('html, body').animate({
      scrollTop: $('#wp-block-cab-abonament').offset().top
    }, 800); // Adjust scroll speed as needed
  }

  // Function to navigate to the previous fieldset
  function navigateToPreviousFieldset(currentFieldset) {
    var $currentFieldset = $(currentFieldset);
    $currentFieldset.hide();
    $currentFieldset.prev('fieldset').show();
    updateProgressBar('back'); // Update progress bar when navigating to the previous fieldset

    // Scroll to #wp-block-cab-abonament section
    $('html, body').animate({
      scrollTop: $('#wp-block-cab-abonament').offset().top
    }, 800); // Adjust scroll speed as needed
  }

  // Function to update the progress bar
  function updateProgressBar(direction = 'next') {
    var $visibleFieldset = $('fieldset:visible');
    var currentStep = $visibleFieldset.index() + 1; // Get the current step number (1-based index)
    var stepClass = 'step-' + currentStep; // Generate the class name based on the step

    if (direction === 'next') {
      $('.' + stepClass).addClass('step-active'); // Add active class to all elements with the current step class
    } else if (direction === 'back') {
      var prevStepClass = 'step-' + (currentStep + 1);
      $('.' + prevStepClass).removeClass('step-active'); // Remove active class from all elements with the previous step class
    }
  }

  // Function to copy and split UserName to billing_first_name and billing_last_name
  function copyUserNameToBilling() {
    var userName = $('#UserName').val().trim(); // Get the value from the UserName input and trim any extra spaces
    var nameParts = userName.split(' ', 2); // Split the value into first and second part
    var adressCity = $('#UserCity').val();
    var adressStreet = $('#UserAdres').val();
    var adressHouseNumber = $('#UserHomeNumber').val();
    var adressPostCode = $('#UserPostCode').val();
    var userPhone = $('#UserPhone').val();
    var userEmail = $('#UserEmail').val();
    if (nameParts.length > 0) {
      $('#billing_first_name').val(nameParts[0]); // Set the first part as the first name
    }

    if (nameParts.length > 1) {
      $('#billing_last_name').val(nameParts[1]); // Set the second part as the last name
    } else {
      $('#billing_last_name').val(''); // Clear the last name if there is no second part
    }

    $('#billing_city').val(adressCity);
    $('#billing_address_1').val(adressStreet + '' + adressHouseNumber);
    $('#billing_postcode').val(adressPostCode);
    $('#billing_phone').val(userPhone);
    $('#billing_email').val(userEmail);
    $('#order-summary-customer-location').text(adressCity + ',' + adressStreet + '' + adressHouseNumber);
  }
  function copyDatesToTextarea() {
    // Get the text from the <p> element with the class 'checkout-final-dates-txt'
    var datesText = $('.checkout-final-dates-txt').text().trim();

    // Prepend "Termin Dostaw" to the text
    var outputText = "Termin Dostaw: " + datesText;

    // Set the text to the <textarea> with the ID 'order_comments'
    $('#order_comments').val(outputText);
  }
  $(document).ready(function () {
    // Get today's date
    var today = new Date();

    // Increment the date by one day
    today.setDate(today.getDate() + 1);

    // Format the date to yyyy-mm-dd
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();
    var nextDay = yyyy + '-' + mm + '-' + dd;

    // Set the min attribute of the date input
    $('#date').attr('min', nextDay);
  });
  // Attach the copyUserNameToBilling function to the UserName input change event
  $(document).on('input', '#UserName', function () {
    copyUserNameToBilling();
  });
  // Attach the copyUserNameToBilling function to the UserAdresCity input change event
  $(document).on('input', '#UserCity', function () {
    copyUserNameToBilling();
  });
  // Attach the copyUserNameToBilling function to the UserAdres input change event
  $(document).on('input', '#UserAdres', function () {
    copyUserNameToBilling();
  });
  // Attach the copyUserNameToBilling function to the UserAdresHouseNumber input change event
  $(document).on('input', '#UserHomeNumber', function () {
    copyUserNameToBilling();
  });
  // Attach the copyUserNameToBilling function to the UserAdresHouseNumber input change event
  $(document).on('input', '#UserPostCode', function () {
    copyUserNameToBilling();
  });
  // Attach the copyUserNameToBilling function to the UserAdresHouseNumber input change event
  $(document).on('input', '#UserPhone', function () {
    copyUserNameToBilling();
  });
  $(document).on('input', '#UserEmail', function () {
    copyUserNameToBilling();
  });
  // Initial call to set the correct step on page load
  updateProgressBar();

  // Handle next button click
  $(document).on('click', '.next', function (e) {
    var $this = $(this);
    var shouldNavigate = true; // Flag to control navigation

    // Function to check if all form fields are filled, including the select input
    function checkFormFields() {
      let allFilled = true;

      // Clear previous highlights
      $('#form-deliver-details :input').removeClass('input-error');

      // Check UserName for two words
      let userName = $('#UserName').val().trim();
      let nameParts = userName.split(' ');
      if (nameParts.length !== 2) {
        $('#UserName').addClass('input-error'); // Highlight the UserName field
        allFilled = false;
      }

      // Validate UserEmail format
      let userEmail = $('#UserEmail').val().trim();
      let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email regex
      if (!emailRegex.test(userEmail)) {
        $('#UserEmail').addClass('input-error'); // Highlight the UserEmail field
        allFilled = false;
      }

      // Validate UserPhone format
      let userPhone = $('#UserPhone').val().trim();
      let phoneRegex = /^[0-9]{9,15}$/; // Example regex for phone numbers
      if (!phoneRegex.test(userPhone)) {
        $('#UserPhone').addClass('input-error'); // Highlight the UserPhone field
        allFilled = false;
      }

      // Loop through each input field in the form
      $('#form-deliver-details :input').each(function () {
        if ($(this).val() === '') {
          $(this).addClass('input-error'); // Highlight empty fields
          allFilled = false;
        }
      });

      // Check if the select input has a valid option selected (not "Wybierz")
      let selectedCity = $('#UserCity').val();
      if (!selectedCity || selectedCity === "") {
        $('#UserCity').addClass('input-error'); // Highlight the select input
        allFilled = false;
      }
      return allFilled;
    }

    // Validate form fields before navigation
    if (!checkFormFields()) {
      e.preventDefault(); // Prevents form submission and navigation
      alert("There is an error. Please fill out all fields with valid entries."); // Show popup if form is not filled
      return; // Stop further processing if form is incomplete
    }

    // Existing AJAX and navigation logic
    if ($this.attr('id') === 'render-product-attributes') {
      // Verify if AJAX URL is defined
      if (typeof CAB_loc !== 'undefined' && typeof CAB_loc.ajax_url === 'string') {
        // Send AJAX request to WordPress AJAX handler
        $.ajax({
          url: CAB_loc.ajax_url,
          // Use localized variable for AJAX URL
          type: 'POST',
          data: {
            action: 'render_product_attributes' // This should match the action name registered in PHP
          },

          success: function (response) {
            $('#productVariationsFieldset').html(response).show();
            applyActiveClassProductTime();
            setupAllergenCheckboxes();
          },
          error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error); // Log errors if any
            shouldNavigate = false; // Prevent navigation on error
          }
        });
      } else {
        console.error('AJAX URL is not defined. Check if the script is correctly enqueued and localized.');
        shouldNavigate = false; // Prevent navigation if URL is not defined
      }
    } else if ($this.attr('id') === 'render_orderSummaryFieldset') {
      // Verify if AJAX URL is defined
      if (typeof CAB_loc !== 'undefined' && typeof CAB_loc.ajax_url === 'string') {
        // Send AJAX request to WordPress AJAX handler
        $.ajax({
          url: CAB_loc.ajax_url,
          // Use localized variable for AJAX URL
          type: 'POST',
          data: {
            action: 'load_checkout_section' // This should match the action name registered in PHP
          },

          success: function (response) {
            $('#orderSummaryFieldset').html(response).show();
            copyUserNameToBilling();
            copyDatesToTextarea();
          },
          error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error); // Log errors if any
            shouldNavigate = false; // Prevent navigation on error
          }
        });
      } else {
        console.error('AJAX URL is not defined. Check if the script is correctly enqueued and localized.');
        shouldNavigate = false; // Prevent navigation if URL is not defined
      }
    }

    // Only navigate to the next fieldset if no AJAX call is in progress or if there were no errors
    if (shouldNavigate) {
      navigateToNextFieldset($this.closest('fieldset'));
    }
  });

  // Remove error highlighting on input change
  $(document).on('input', '#form-deliver-details :input', function () {
    $(this).removeClass('input-error'); // Remove the error class when user starts typing
  });

  // CSS for highlighting error inputs
  $('<style>').prop('type', 'text/css').html(`
        .input-error {
            border: 2px solid red; /* Red border for errors */
            background-color: #ffe6e6; /* Light red background for errors */
        }
    `).appendTo('head');

  // Function to handle the navigation to the next fieldset (you can customize this logic)
  //     function navigateToNextFieldset($currentFieldset) {
  //         var $nextFieldset = $currentFieldset.next('fieldset'); // Get the next fieldset
  //         if ($nextFieldset.length) {
  //             $currentFieldset.hide(); // Hide the current fieldset
  //             $nextFieldset.show();    // Show the next fieldset
  //         }
  //     }
  // Delegate event to dynamically loaded elements for "Back" button
  $(document).on('click', '.back', function () {
    var $this = $(this);
    navigateToPreviousFieldset($this.closest('fieldset'));
  });

  // Handle click on product-time-variation
  $(document).on('click', '.product-time-variation', function () {
    let divId = $(this).attr('id');
    setCookie('Selected_Product_Time', divId);
    applyActiveClassProductTime();

    // Optionally, you can log the cookie value to confirm it's set
    console.log('Cookie set: ' + document.cookie);
  });

  // Handle click on weekend-checkbox
  $(document).on('click', '.weekend-checkbox', function () {
    let divId = $(this).attr('id');
    setCookie('Selected_Product_Weekend', divId);
    applyActiveClassProductWeekend();

    // Optionally, you can log the cookie value to confirm it's set
    console.log('Cookie set: ' + document.cookie);
  });

  // Handle change on #date input
  $(document).on('change', '#date', function () {
    var dateValue = $(this).val();
    setCookie('Starting_Date', dateValue);

    // Optionally, you can log the cookie value to confirm it's set
    console.log('Cookie set: ' + document.cookie);
  });

  // Handle value of day duration
  function setDayDurationCookie() {
    var dayDuration = $('#day_duration').text().trim(); // Ensure to trim any extra spaces
    console.log('Raw day duration text:', dayDuration); // Log the raw text

    var numericDayDuration = extractNumbers(dayDuration);
    console.log('Extracted numeric value:', numericDayDuration); // Log the numeric value

    if (numericDayDuration) {
      // Check if numeric value is not empty
      setCookie('Day_Duration', numericDayDuration);
    } else {
      console.error('No numeric value found for Day_Duration cookie.');
    }
  }

  // Call setDayDurationCookie on page load
  setDayDurationCookie();

  // Handle change on weekend-checkbox to allow only one checked
  $(document).on('change', '.weekend-checkbox', function () {
    $('.weekend-checkbox').not(this).prop('checked', false);
  });

  // Handle date input click
  $(document).on('click', '#date', function () {
    $(this)[0].showPicker(); // Trigger the native date picker if possible
    // Fallback: focus the date input
    $(this).focus();
  });

  // Handle click on add-to-cart-button
  $(document).on('click', '#add-to-cart-button', function (e) {
    e.preventDefault();
    var $button = $(this);
    var product_id = $('#product-id').val();
    var quantity = $('#quantity').val();
    var nonce = $button.data('nonce');
    var ajaxurl = $button.data('ajax-url');
    var variation = {
      'variation_id': $('#' + product_id).val(),
      'attributes': {
        'attribute_pa_czas': $('#attribute-pa-czas').val(),
        'attribute_pa_weekend': $('#attribute-pa-weekend').val()
      }
    };
    var custom_value = 'some_custom_value'; // Replace with actual custom value if needed

    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'add_custom_product_to_cart',
        nonce: nonce,
        product_id: product_id,
        quantity: quantity,
        variation: variation,
        custom_value: custom_value
      },
      success: function (response) {
        if (response.success) {
          alert('Product added to cart successfully.');
          // Optionally, update the cart UI or redirect to the cart page
        } else {
          alert('Error: ' + response.data.message);
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText); // Log the response for debugging
        alert('An error occurred. Please try again.\nStatus: ' + status + '\nError: ' + error);
      }
    });
  });
  $('.clear-cart').on('click', function () {
    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      type: 'POST',
      data: {
        action: 'clear_cart'
      },
      success: function (response) {
        if (response.success) {
          console.log('Cart cleared successfully.');
          // Optionally, you can redirect to a new page or refresh the page
          // location.reload(); // Uncomment this line if you want to reload the page
        } else {
          console.error('Failed to clear cart.');
        }
      },
      error: function () {
        console.error('AJAX request failed.');
      }
    });
  });
  // Handle click on .product-single elements
  $(document).on('click', '.product-single', function () {
    let divId = $(this).attr('id');
    setCookie('Selected_Product', divId);
    applyActiveClassProduct();

    // Verify if AJAX URL is defined
    if (typeof CAB_loc !== 'undefined' && typeof CAB_loc.ajax_url === 'string') {
      // Send AJAX request to WordPress AJAX handler
      $.ajax({
        url: CAB_loc.ajax_url,
        // Use localized variable for AJAX URL
        type: 'POST',
        data: {
          action: 'my_custom_action',
          // This should match the action name registered in PHP
          selectedProduct: divId
        },
        success: function (response) {
          console.log('Response from server:', response);
        },
        error: function (xhr, status, error) {
          console.error('AJAX Error:', status, error);
        }
      });
    } else {
      console.error('AJAX URL is not defined. Check if the script is correctly enqueued and localized.');
    }

    // Optionally, you can log the cookie value to confirm it's set
    console.log('Cookie set: ' + document.cookie);
  });
  function setupAllergenCheckboxes() {
    $('.allergens-attribute-state-section .allergen-state-checkbox').off('change').on('change', function () {
      if ($(this).is(':checked')) {
        // Uncheck all other checkboxes in the same section
        $('.allergens-attribute-state-section .allergen-state-checkbox').not(this).prop('checked', false);

        // Show or hide the allergens-attribute-list based on which checkbox is checked
        if ($('#allergen-option-yes').is(':checked')) {
          $('.allergens-attribute-list').show(); // Show the list if "yes" is checked
        } else {
          $('.allergens-attribute-list').hide(); // Hide the list if "no" is checked
        }
      }
    });
  }

  // Call functions to apply the active class on page load
  applyActiveClassProduct();
  applyActiveClassProductTime();
  applyActiveClassProductWeekend();
  setDayDurationCookie();
});

/***/ }),

/***/ 521:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 169:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 34:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 219:
/***/ (() => {

jQuery(document).ready(function ($) {
  $('.tile-single-txt-container').hover(function () {
    // Mouse over
    $(this).css('background-color', $(this).data('hover-color'));
  }, function () {
    // Mouse out
    $(this).css('background-color', '#fff'); // Default color on mouse out
  });
});

/***/ }),

/***/ 22:
/***/ (() => {

jQuery(document).ready(function ($) {
  // Append lightbox container to body
  $('body').append('<div id="lightbox" style="display:none;"><span class="close">&times;</span><img class="lightbox-content" src=""></div>');

  // When an image in the gallery is clicked
  $('.gallery-row').on('click', '.gallery-item', function (event) {
    event.preventDefault();
    var imgSrc = $(this).attr('href');

    // Show the lightbox
    $('#lightbox').show();
    $('#lightbox .lightbox-content').attr('src', imgSrc);
  });

  // Close the lightbox when the close button is clicked
  $('#lightbox').on('click', '.close', function () {
    $('#lightbox').hide();
  });

  // Close the lightbox when clicking outside the image
  $(document).on('click', function (event) {
    if ($(event.target).is('#lightbox')) {
      $('#lightbox').hide();
    }
  });
});

/***/ }),

/***/ 239:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 963:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 591:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 124:
/***/ (() => {

jQuery(document).ready(function ($) {
  // function HideRange() {
  //     $('.cab-range-item-single[data-id]').each(function () {
  //         var dataId = parseInt($(this).data('id')); // Get the value of data-id as an integer
  //
  //         // Check if data-id is greater than 3
  //         if (dataId > 3) {
  //             $(this).hide(); // Hide the element
  //         }
  //     });
  //     $(".cab-showmore-posts-txt").click(function () {
  //         $('.cab-showmore-posts').hide();
  //         $('.cab-range-item-single[data-id]').each(function () {
  //             var dataId = parseInt($(this).data('id')); // Get the value of data-id as an integer
  //
  //             // Check if data-id is greater than 3
  //             if (dataId > 3) {
  //                 $(this).show(); // Show the element
  //             }
  //         });
  //     });
  // }
  // HideRange();
});

/***/ }),

/***/ 200:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/* harmony import */ var _blocks_hero_script__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(34);
/* harmony import */ var _blocks_hero_script__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_blocks_hero_script__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _blocks_list_script__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(239);
/* harmony import */ var _blocks_list_script__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_blocks_list_script__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _blocks_range_list_script__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(124);
/* harmony import */ var _blocks_range_list_script__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_blocks_range_list_script__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _blocks_abonament_script__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(74);
/* harmony import */ var _blocks_abonament_script__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_blocks_abonament_script__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _blocks_homepage_hero_script__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(219);
/* harmony import */ var _blocks_homepage_hero_script__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_blocks_homepage_hero_script__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _blocks_text_section_script__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(200);
/* harmony import */ var _blocks_text_section_script__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_blocks_text_section_script__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _blocks_image_gallery_script__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(22);
/* harmony import */ var _blocks_image_gallery_script__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_blocks_image_gallery_script__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _blocks_locations_script__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(963);
/* harmony import */ var _blocks_locations_script__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_blocks_locations_script__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _blocks_menu_block_script__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(591);
/* harmony import */ var _blocks_menu_block_script__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_blocks_menu_block_script__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _blocks_contact_info_script__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(169);
/* harmony import */ var _blocks_contact_info_script__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_blocks_contact_info_script__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _blocks_contact_form_script__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(521);
/* harmony import */ var _blocks_contact_form_script__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_blocks_contact_form_script__WEBPACK_IMPORTED_MODULE_10__);











})();

// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
// extracted by mini-css-extract-plugin

})();

/******/ })()
;
//# sourceMappingURL=bundle.js.map