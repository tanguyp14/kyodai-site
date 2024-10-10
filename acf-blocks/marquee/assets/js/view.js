(function ($) {
	$(document).ready(function () {
		// Sélectionner l'élément avec la classe marquee
		$('.marquee').each(function () {
			var id = $(this).attr('id');
			// ou effectuer toute autre opération avec l'id
			var marqueeTextElement = $('#' + id + ' .marquee_text');
			console.log('#' + id + '.marquee_text');
			var marqueeText = marqueeTextElement.text();

			// Créer un conteneur pour le texte défilant
			var marqueeContainer = $('<div class="' + id + ' marquee_container"></div>');
			var marqueeContent = $('<div class="' + id + ' marquee_content"></div>');

			// Dupliquer le texte plusieurs fois pour remplir deux fois la largeur de l'écran
			var repeatCount = Math.ceil($(window).width() / marqueeTextElement.width());
			for (var i = 0; i < repeatCount; i++) {
				marqueeContent.append(marqueeText + ' ');
			}

			// Ajouter le contenu au conteneur
			marqueeContainer.append(marqueeContent);

			// Remplacer l'élément marquee_text par le conteneur
			marqueeTextElement.replaceWith(marqueeContainer);
		});
	});
})(jQuery);
