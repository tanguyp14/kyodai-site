(function ($) {
		$(document).ready(function () {
			$('.marquee').each(function () {
				var id = $(this).attr('id');
				var speed = $(this).attr('data-speed');

				var marqueeTextElement = $('#' + id + ' .marquee_text');
				var marqueeText = marqueeTextElement.html();
				
				// Créer un conteneur pour le texte défilant
				var marqueeContainer = $('<div class="' + id + ' marquee_container"></div>');
				var marqueeContent = $('<div class="' + id + ' marquee_content" style="animation-duration:' + speed + 's"></div>');
				
				// Ajouter initialement le texte une première fois
				marqueeContent.append(marqueeText + ' ');
		
				// Ajouter le contenu au conteneur avant d'autres calculs
				marqueeContainer.append(marqueeContent);
				marqueeTextElement.replaceWith(marqueeContainer);
		
				// Calculer la nouvelle largeur après avoir ajouté une première itération
				var marqueeTextWidth = marqueeContent.outerWidth(true);
		
				// Calculer le nombre de répétitions
				var repeatCount = Math.ceil(($(window).width() / marqueeTextWidth));
		
				// Ajouter des itérations supplémentaires
				for (var i = 1; i < repeatCount; i++) {
					marqueeContent.append(marqueeText + ' ');
				}
				var inside = $('#' + id + ' .marquee_content .inside').width();

				// Ajouter l'animation de translation
				marqueeContent.css({
					'display': 'flex',
					'white-space': 'nowrap',
					'animation': 'marqueeAnimation ' + speed + 's linear infinite'
				});

				// Ajouter les styles d'animation dans une balise <style>
				var style = $('<style>@keyframes marqueeAnimation { 0% { transform: translateX(0); } 100% { transform: translateX(-' + (inside + 20) + 'px); } }</style>');
				$('head').append(style);

			});
		});
})(jQuery);
