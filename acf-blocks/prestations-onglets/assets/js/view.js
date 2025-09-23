(function ($) {
    document.addEventListener('DOMContentLoaded', function() {
        const onglets = document.querySelectorAll('.nom_onglet .nom');
        const contenus = document.querySelectorAll('.onglet .contenu');

        // Ajouter la classe "active" au premier onglet et contenu par défaut
        if (onglets.length > 0 && contenus.length > 0) {
            onglets[0].classList.add('active');
            contenus[0].classList.add('active');
        }

        // Fonction pour égaliser les hauteurs des .contenu_text
        function equalizeHeights() {
            const isMobile = window.matchMedia('(max-width: 767px)').matches;
                const selector = isMobile ? '.contenu' : '.contenus_text';
            let maxHeight = 0;
            // Parcourir tous les .contenu_text (même ceux non actifs)
            document.querySelectorAll(selector).forEach(el => {
                // Réinitialiser temporairement la hauteur pour mesurer le contenu réel
                el.style.height = 'auto';
                const height = el.offsetHeight;
                if (height > maxHeight) {
                    maxHeight = height;
                }
            });

            // Appliquer la hauteur maximale à tous les .contenu_text
            document.querySelectorAll(selector).forEach(el => {
                el.style.height = maxHeight + 'px';
            });
        }

        // Appeler la fonction au chargement et après chaque clic sur un onglet
        equalizeHeights();

        // Gestion du clic sur les onglets
        onglets.forEach(onglet => {
            onglet.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                onglets.forEach(o => o.classList.remove('active'));
                contenus.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                const activeContent = document.querySelector(`.onglet .contenu[data-tab="${tabId}"]`);
                activeContent.classList.add('active');

                // Réégaliser les hauteurs après le changement d'onglet
                setTimeout(equalizeHeights, 100); // Petit délai pour laisser le temps au contenu de s'afficher
            });
        });

        // Réégaliser les hauteurs en cas de redimensionnement de fenêtre
        window.addEventListener('resize', equalizeHeights);
    });
})(jQuery);
