(function ($) {
		$(window).on('load', function () {
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
				console.log('Marquee Text Width after adding content:', marqueeTextWidth);
		
				// Calculer le nombre de répétitions
				var repeatCount = Math.ceil(($(window).width() / marqueeTextWidth) * 2);
				console.log('Repeat Count:', repeatCount);
		
				// Ajouter des itérations supplémentaires
				for (var i = 1; i < repeatCount; i++) {
					marqueeContent.append(marqueeText + ' ');
				}
		
				// Après avoir ajouté toutes les répétitions, vérifier la largeur
				console.log('Final Marquee Content Width:', marqueeContent.outerWidth(true));
			});
		});
})(jQuery);
