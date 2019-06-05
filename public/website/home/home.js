/**
 * Change background color and text
 * on scroll
*/

jQuery(function () {


    jQuery(window).scroll(function () {
        addBackgroundHeader();
    });

    addBackgroundHeader();

    new WOW().init();

    jQuery('#carouselFade.carousel').carousel({
        interval: 4000,
        pause: "false"
    })

});

function addBackgroundHeader() {
    var isHomeExp = jQuery('body').hasClass('new-home');

    if (!isHomeExp) {

        var header = jQuery("#wrapperHeader"),
            header2 = jQuery("#sidebar-right");

        var scroll = jQuery(window).scrollTop();

        if (scroll >= 1) {
            header.attr('is-scroll', '1');
            header2.attr('is-scroll', '1');
            jQuery("[is-scroll].navbar #logo_white img, [is-scroll]#wrapperHeader #logo_white img");
        } else {
            jQuery(".navbar #logo_white img, #wrapperHeader #logo_white img");
            header.removeAttr('is-scroll');
            header2.removeAttr('is-scroll');
        }
    }
}

