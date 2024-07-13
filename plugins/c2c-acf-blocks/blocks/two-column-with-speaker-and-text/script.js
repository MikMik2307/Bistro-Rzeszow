jQuery( document ).ready( function( $ ) {
	$('body').on('click', '.oab-two-column-with-speaker-and-text__btn', function () {
		$(this).closest('.oab-two-column-with-speaker-and-text__content-container').find('.oab-two-column-with-speaker-and-text__video').css("display", "block");
	});

	$(document).mouseup( function(e){

		if ( !$('.oab-two-column-with-speaker-and-text__item').is(e.target) && $('.oab-two-column-with-speaker-and-text__item').has(e.target).length === 0 ) {
			let iframe = $('.oab-two-column-with-speaker-and-text__video').find('iframe');

			if (iframe.length) {
				let src = iframe.attr('src');
				iframe.attr('src', '');
				iframe.attr('src', src)
			}
			$('.oab-two-column-with-speaker-and-text__video').hide();
		}
	});

});
