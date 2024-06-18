(function ($) {
	$(document).ready(function ($) {
		$('.swipper').slick({
			infinite: true,
			slidesToShow: 3,
			arrows: false,
			centerMode: true,
			centerPadding: '5vw',
			variableWidth: true,
			adaptiveHeight: true,
			autoplay: true,
			responsive: [
				{
				  breakpoint: 1000,
				  settings: {
					slidesToShow: 1,
				  }
				}
			  ]
		});
	});
	$(window).load(function () {

	});
})(jQuery);