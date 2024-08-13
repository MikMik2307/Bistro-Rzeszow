
jQuery(document).ready(function ($) {


		// $('.navbar-toggler').on('click', function() {
		// 	window.navPosition =  $(window).scrollTop();
		// })
		$('.navbar-toggler').on('click', function() {
			$('.navbar-toggler-icon').toggleClass('cancel');
		})

		$(window).scroll(function() {
			if ($(this).scrollTop() > 200) {
				$('.header__navbar--navy .featured').fadeIn(200);
			}
			if ($(this).scrollTop() < 200) {
				$('.header__navbar--navy .featured').fadeOut(200);
			}
			// if ($(this).width() < 1200) {
			// 	if (($(this).scrollTop() > (window.navPosition + 200)) || ($(this).scrollTop() < (window.navPosition - 200)) ) {
			//
			// 		$('#navbarNavDropdown').removeClass('show');
			// 		$('.navbar-toggler').addClass('collapsed');
			// 	}
			// }
		});
		// Show the popup when the link is clicked
		$('.menu-order-online').on('click', function(e) {
			e.preventDefault(); // Prevent default link behavior
			$('.popup-overlay').addClass('show');
		});

		// Hide the popup when the close button is clicked
		$('.popup-close').on('click', function() {
			$('.popup-overlay').removeClass('show');
		});

		// Hide the popup when clicking outside of the popup content
		$('.popup-overlay').on('click', function(e) {
			if ($(e.target).is('.popup-overlay')) {
				$(this).removeClass('show');
			}
		});
});


