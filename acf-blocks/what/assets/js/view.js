(function ($) {
	$(document).ready(function ($) {
		if ($(window).width() > 760) {
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
		}

		if ($(window).width() < 760) {

			$('.mobile.list-menu h2').click(function () {
				$('.text.visible').removeClass('visible');
				$('.list-menu h2').removeClass('visible');
				$('.list-menu .img').removeClass('visible');
				$(this).addClass('visible');
				$(this).next('.text').addClass('visible');
				$(this).next('.text').next('.img').addClass('visible');
				var scrollPosition = $(this).offset().top - 140;
				window.scrollTo({
					top: scrollPosition,
					behavior: 'smooth' // Pour un défilement fluide, si nécessaire
				});
			});
			$('.mobile.list-menu .text:first').addClass('visible');
			$('.mobile.list-menu h2:first').addClass('visible');
			$('.mobile.list-menu .img:first').addClass('visible');
		}

	});
	$(window).load(function () {

	});
})(jQuery);