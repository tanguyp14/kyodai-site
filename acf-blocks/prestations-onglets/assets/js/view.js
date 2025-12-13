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

      // Equalizer les hauteurs des .contenu (desktop seulement)
      if (isDesktop) {
        document.querySelectorAll(selector).forEach(el => {
          el.style.height = "";
        });

        document.querySelectorAll(`${selector}.active`).forEach(el => {
          const height = el.offsetHeight;
          if (height > maxHeight) maxHeight = height;
        });

        document.querySelectorAll(selector).forEach(el => {
          el.style.height = maxHeight + "px";
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
        // Réégaliser seulement les hauteurs des contenus, pas le min-height
        setTimeout(() => {
          const selector = ".contenu";
          let maxHeight = 0;

          if (window.matchMedia("(min-width: 992px)").matches) {
            document.querySelectorAll(selector).forEach(el => {
              el.style.height = "";
            });

            document.querySelectorAll(`${selector}.active`).forEach(el => {
              const height = el.offsetHeight;
              if (height > maxHeight) maxHeight = height;
            });

            document.querySelectorAll(selector).forEach(el => {
              el.style.height = maxHeight + "px";
            });
          }
        }, 50);
      }
    }

    // Événements
    onglets.forEach(onglet => {
      onglet.addEventListener("click", () => handleTabChange(onglet));
    });

    equalizeHeights();
    window.addEventListener("resize", () => {
      // Réinitialiser le verrouillage en cas de redimensionnement significatif
      if (window.matchMedia("(min-width: 992px)").matches) {
        minHeightLocked = false;
        equalizeHeights();
      }
    });

    window.addEventListener("load", equalizeHeights);
  });
})(jQuery);
