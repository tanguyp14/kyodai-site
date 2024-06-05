(function ($) {

    $('document').ready(function () {
        if (window.location.pathname !== '/') {
            $('header').addClass('fixed');
        }
        // Burger nav
        $('.mobile-menu-button').click(function () {
            $(this).toggleClass('open');
            $('.left-menu').toggleClass('open');
        });

        $('.menu li').click(function () {
            $('.mobile-menu-button').removeClass('open');
            $('.left-menu').removeClass('open');
        });

        $('#main-content').click(function () {
            $('.mobile-menu-button').removeClass('open');
            $('.left-menu').removeClass('open');
        });
        $(".pwl").each(function () {
            $(this).append("<span class='stamp'></span>");
        });

        // Création d'une instance de l'Intersection Observer
        let observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.intersectionRatio >= 0.5) {
                    // Ajout d'une classe pour lancer l'animation
                    $(entry.target).addClass('animate');
                } else {
                    // Retrait de la classe si l'élément n'est plus visible
                    $(entry.target).removeClass('animate');
                }
            });
        }, { threshold: 0.5 });

        // Sélection de tous les éléments avec la classe '.stamp'
        let stamps = $(".stamp");

        // Observations pour chaque élément '.stamp'
        stamps.each(function () {
            observer.observe(this);
        });

    });


    $(window).scroll(function () {
        if ($(window).scrollTop() >= $(window).height() - ($(window).height() * 0.10)) {
            $('header').addClass('fixed');
            $('.back-top').addClass('show');
            if (window.location.pathname !== '/') {
                $('header').addClass('fixed');
            }
        } else {
            $('header').removeClass('fixed');
            $('.back-top').removeClass('show');
            if (window.location.pathname !== '/') {
                $('header').addClass('fixed');
            }
        }
    });


}(jQuery));