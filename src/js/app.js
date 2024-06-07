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