(function ($) {
	$(document).ready(function () {
		$('.avis').slick({
			infinite: true,
			autoplay: true,
			autoplaySpeed: 5000,
			centerMode: true,
			arrows: true,
			variableWidth: true,
			prevArrow: $('.arrow_left'),
			nextArrow: $('.arrow_right'),
		});

		// Cibler uniquement les éléments originaux
		$('.avis .avi').each(function () {
			var className = $(this).attr('data-id'); // Récupérer la classe de l'élément

			// Appliquer les styles à tous les éléments ayant la même classe
			$('.avis .avi[data-id="' + className + '"]').css({

			});
		});

	});
})(jQuery);