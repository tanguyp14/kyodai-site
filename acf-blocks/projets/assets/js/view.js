(function ($) {
	$(document).ready(function ($) {
		new Masonry('.grid', {
			// containerStyle: null,
			itemSelector: '.grid-item',
			columnWidth: '.grid-item',
			percentPosition: true,
			gutter: 20
		});

		$('.image').mouseenter(function(e) {
			var $element = $(this);
			var offset = $element.offset();
			var width = $element.width();
			var height = $element.height();
			var x = e.pageX - offset.left;
			var y = e.pageY - offset.top;
			var $description = $element.find('.description');
	
			$description.css({ 'left': '-100%', 'right': 'auto', 'top': 'auto', 'bottom': 'auto' });
	
			if (x < width / 4) {
				$description.addClass('left');
				$description.css({ 'top': '0', 'left': '0' });

			} else if (x > width * 3 / 4) {
				$description.addClass('right');
				$description.css({ 'top': '0', 'right': '0' });

			} else if (y < height / 4) {
				$description.addClass('top');
				$description.css({ 'top': '0', 'left': '0' });
			} else if (y > height * 3 / 4) {
				$description.addClass('bottom');
				$description.css({ 'bottom': '0', 'left': '0' });

			}

		});
		$('.image').mouseleave(function() {
			$(this).find('.description').removeClass('left right top bottom');
		});

	});
	$(window).load(function () {

	});
})(jQuery);

