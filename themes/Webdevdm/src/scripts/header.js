
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
});


