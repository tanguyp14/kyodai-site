(function($) {
	$(document).ready(function() {
		// Sélectionner l'élément avec la classe marquee_text
		var marqueeTextElement = $('.marquee_text');
		var marqueeText = marqueeTextElement.text();

		// Créer un conteneur pour le texte défilant
		var marqueeContainer = $('<div class="marquee_container"></div>');
		var marqueeContent = $('<div class="marquee_content"></div>');

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
})(jQuery);