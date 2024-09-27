(function($) {
    $(document).ready(function() {
        // Sélectionner l'élément avec la classe marquee_text
        var marqueeText = $('.marquee_text').text();

        // Créer un conteneur pour le texte défilant
        var marqueeContainer = $('<div class="marquee_container"></div>');
        var marqueeContent = $('<div class="marquee_content"></div>');

        // Dupliquer le texte plusieurs fois pour remplir la largeur de l'écran
        var repeatCount = Math.ceil($(window).width() / $('.marquee_text').width()) + 1;
        for (var i = 0; i < repeatCount; i++) {
            marqueeContent.append(marqueeText + ' ');
        }

        // Ajouter le contenu au conteneur
        marqueeContainer.append(marqueeContent);
        $('body').append(marqueeContainer); // Ajouter le conteneur au body ou à un autre élément approprié

        // Appliquer des styles et des animations
        $('.marquee_container').css({
            'overflow': 'hidden',
            'white-space': 'nowrap',
            'width': '100%',
            'position': 'relative'
        });

        $('.marquee_content').css({
            'display': 'inline-block',
            'animation': 'marquee 10s linear infinite'
        });

        // Ajouter les styles d'animation
        $('<style>')
            .prop('type', 'text/css')
            .html(`
                @keyframes marquee {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-100%); }
                }
            `)
            .appendTo('head');
    });
})(jQuery);