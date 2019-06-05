(function ($) {
    'use strict';

    $(document).ready(function () {
        var footerTitle = $('.footer_title '),
            footerLinks = $('.footer_links').not('.social_links'),
            footerArrow = $('.i123-expand');

        footerTitle.on('click', toggleLinksIfNeeded);

        window.onresize = showOrHideLinksOnResize;

        function toggleLinksIfNeeded() {
            if (window.innerWidth >= 992) {
                return;
            }

            var currentLinks = $(this).next(footerLinks),
                currentArrow = $(this).find(footerArrow);

            footerLinks.not(currentLinks).slideUp('fast');
            currentLinks.slideToggle('fast');

            footerArrow.not(currentArrow).removeClass('rotate180deg');
            currentArrow.toggleClass('rotate180deg');
        }

        function showOrHideLinksOnResize() {
            window.innerWidth >= 992 ? footerLinks.show() : footerLinks.hide();
        }
    });
})(jQuery);
