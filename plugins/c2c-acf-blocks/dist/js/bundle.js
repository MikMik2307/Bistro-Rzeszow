/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ 74:
/***/ (() => {

jQuery(document).ready(function ($) {
  function SetStartingStep() {
    let startingStep = $(".step-1");
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
  $('.next').on('click', function () {
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
  $('.back').on('click', function () {
    var currentFieldset = $(this).closest('fieldset');
    currentFieldset.hide();
    currentFieldset.prev('fieldset').show();

    // Scroll to #wp-block-cab-abonament section
    $('html, body').animate({
      scrollTop: $('#wp-block-cab-abonament').offset().top
    }, 800); // Adjust scroll speed as needed
  });

  $('#24').on('click', function () {
    // Function to set a cookie
    function setCookie(name, value, days) {
      let expires = "";
      if (days) {
        let date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Set a session cookie (expires when the browser is closed)
    setCookie('Selected_product', '24');
    $('#24').addClass('Selected-Product');
  });
  function setCookie(name, value, days) {
    let expires = "";
    if (days) {
      let date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
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
  function applyActiveClass() {
    let currentCookie = getCookie('Selected_Product');
    $('li').removeClass('selected-product-active'); // Remove active class from all divs
    if (currentCookie) {
      $('#' + currentCookie).addClass('selected-product-active'); // Add active class to the div with the id equal to the cookie value
    }
  }

  $('.product-single').on('click', function () {
    let divId = $(this).attr('id');
    setCookie('Selected_Product', divId);
    applyActiveClass();

    // Optionally, you can log the cookie value to confirm it's set
    console.log('Cookie set: ' + document.cookie);
  });
  applyActiveClass();
});

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

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 22:
/***/ (() => {

jQuery(document).ready(function ($) {});

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










})();

// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
// extracted by mini-css-extract-plugin

})();

/******/ })()
;
//# sourceMappingURL=bundle.js.map