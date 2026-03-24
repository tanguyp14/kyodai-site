(function ($) {
  document.addEventListener("DOMContentLoaded", function () {
    const onglets = document.querySelectorAll(".nom_onglet .nom");
    const contenus = document.querySelectorAll(".onglet .contenu");
    let minHeightLocked = false; // Variable pour verrouiller le min-height
    let lockedMinHeight = 0;    // Valeur verrouillée

    // Initialisation
    if (onglets.length > 0 && contenus.length > 0) {
      onglets[0].classList.add("active");
      contenus[0].classList.add("active");
    }

    function equalizeHeights() {
      const selector = ".contenu";
      const selectorForMobile = '.nom_onglet';
      const ongletSelector = '.onglet';
      let maxHeight = 0;
      const isDesktop = window.matchMedia("(min-width: 992px)").matches;

      // Equaliser les hauteurs des .contenu (desktop seulement)
      if (isDesktop) {
        // Reset les hauteurs pour mesurer la hauteur naturelle
        document.querySelectorAll(selector).forEach(el => {
          el.style.height = "";
        });

        // Mesurer TOUS les contenus pour trouver le plus haut
        document.querySelectorAll(selector).forEach(el => {
          const height = el.scrollHeight;
          if (height > maxHeight) maxHeight = height;
        });

        // Appliquer la hauteur max à tous les contenus
        document.querySelectorAll(selector).forEach(el => {
          el.style.height = maxHeight + "px";
        });
      } else {
        // En mobile, reset les hauteurs fixes
        document.querySelectorAll(selector).forEach(el => {
          el.style.height = "";
        });
      }

      // Gestion du min-height de .onglet (version verrouillée)
      const nomOnglet = document.querySelector(selectorForMobile);
      if (nomOnglet) {
        const nomOngletHeight = nomOnglet.offsetHeight;

        if (!minHeightLocked) {
          // Premier calcul : on stocke la valeur
          lockedMinHeight = nomOngletHeight + 30;
          minHeightLocked = true;
        }

        // Appliquer la valeur verrouillée
        document.querySelectorAll(ongletSelector).forEach(onglet => {
          onglet.style.minHeight = lockedMinHeight + "px";
        });
      }
    }

    function handleTabChange(onglet) {
      const tabId = onglet.getAttribute("data-tab");

      onglets.forEach(o => o.classList.remove("active"));
      contenus.forEach(c => c.classList.remove("active"));

      onglet.classList.add("active");
      const activeContent = document.querySelector(`.onglet .contenu[data-tab="${tabId}"]`);
      if (activeContent) {
        activeContent.classList.add("active");
      }
    }

    // Événements
    onglets.forEach(onglet => {
      onglet.addEventListener("click", () => handleTabChange(onglet));
    });

    function positionVisuelsDesktop() {
      const nomOngletContainer = document.querySelector(".nom_onglet");
      if (!nomOngletContainer) return;
      const visuels = nomOngletContainer.querySelector(".visuels_desktop");
      if (!visuels) return;
      const noms = nomOngletContainer.querySelectorAll(".nom");
      if (noms.length === 0) return;

      const lastNom = noms[noms.length - 1];
      const containerRect = nomOngletContainer.getBoundingClientRect();
      const lastNomRect = lastNom.getBoundingClientRect();
      const leftFromLastNom = lastNomRect.right - containerRect.left;
      const halfContainer = containerRect.width * 0.5;
      const leftPos = Math.max(leftFromLastNom, halfContainer);

      visuels.style.left = leftPos + "px";
    }

    positionVisuelsDesktop();
    equalizeHeights();
    window.addEventListener("resize", () => {
      // Réinitialiser le verrouillage en cas de redimensionnement significatif
      if (window.matchMedia("(min-width: 992px)").matches) {
        minHeightLocked = false;
        equalizeHeights();
      }
      positionVisuelsDesktop();
    });

    window.addEventListener("load", () => {
      equalizeHeights();
      positionVisuelsDesktop();
    });
  });
})(jQuery);
