(function ($) {
    $('document').ready(function () {
        AOS.init();
        $(window).scroll(function () {
            if (window.location.pathname === '/') {
                if ($(window).scrollTop() >= 200) {
                    $('header').addClass('sticky');
                } else {
                    $('header').removeClass('sticky');
                }
            }
        });
        $('.button_mobile').on('click', function () {
            $(this).toggleClass('open');
            $('nav').toggleClass('open');
            $('header').toggleClass('open');
            $('main').on('click', function () {
                $('.button_mobile').removeClass('open');
                $('nav').removeClass('open');
                $('header').removeClass('open');
            });
        });
    });

    //back to top
    $(window).scroll(function () {
        if ($(window).scrollTop() >= $(window).height() - ($(window).height() * 0.10)) {
            $('.back-top').addClass('show');
        } else {
            $('.back-top').removeClass('show');
        }
    });


}(jQuery));