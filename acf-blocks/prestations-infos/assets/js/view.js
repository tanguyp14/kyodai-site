(function ($) {
  $(document).ready(function () {
    $(".tylt_info_prestation_images").slick({
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: true,
      slidesToShow: 1,
      dots: false,
      fade: true,
      prevArrow: ".prev_arrow",
      nextArrow: ".next_arrow",
    });
    $(".tylt_lightbox_slick").slick({
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: true,
      slidesToShow: 1,
      dots: false,
      prevArrow: ".prev_arrow_light",
      nextArrow: ".next_arrow_light",
    });
    function isDesktop() {
      return $(window).width() >= 992; // 992px est un breakpoint commun pour desktop
    }

    // Gestion du clic sur les images
    $(document).on("click", ".tylt_info_prestation_images_image", function (e) {
      if (isDesktop()) {
        $(".tylt_lightbox").addClass("active");
      }
    });

    // Gestion du clic sur la lightbox
    $(document).on("click", ".arrows_light", function (e) {
      if (isDesktop() && $(e.target).is(".arrows_light")) {
        $(".tylt_lightbox").removeClass("active");
      }
    });

    // Gestion du redimensionnement de la fenêtre
    $(window).resize(function () {
      if (!isDesktop() && $(".arrows_light").hasClass("active")) {
        $(".tylt_lightbox").removeClass("active");
      }
    });
  });
})(jQuery);
