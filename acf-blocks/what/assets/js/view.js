(function ($) {
	$(document).ready(function ($) {
		$('.list-menu h2').click(function () {
			$('.text.visible').removeClass('visible');
			$('.list-menu h2').removeClass('visible');
			$(this).addClass('visible');
			$(this).next('.text').addClass('visible');
		});
		$('.list-menu .text:first').addClass('visible');
		$('.list-menu h2:first').addClass('visible');

		$('.list-menu h2').click(function () {
			var h2Id = $(this).attr('id');
			$('.list-img .img').removeClass('visible');
			$('.list-img .img.' + h2Id).addClass('visible');
		});
		$('.list-img .img.0').addClass('visible');

	});
	$(window).load(function () {

	});
})(jQuery);