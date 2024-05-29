(function ($) {

    $('document').ready(function () {
        // Burger nav
        $('.mobile-menu-button').click(function () {
            $(this).toggleClass('open');
            $('.left-menu').toggleClass('open');
        });
        $('#main-content').click(function () {
            $('.mobile-menu-button').removeClass('open');
            $('.left-menu').removeClass('open');
        });
        // Do things...
    });

    $(window).scroll(function () {
        // Do things...
    });

}(jQuery));