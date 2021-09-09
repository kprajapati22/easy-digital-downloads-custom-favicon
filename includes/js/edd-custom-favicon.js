/*global jQuery, window, document, EddCustomFaviconVars, Favico*/
jQuery(document).ready(function ($) {
    'use strict';

    var favicon;

    favicon = new Favico({
        bgColor: EddCustomFaviconVars.background,
        textColor: EddCustomFaviconVars.color,
        fontStyle: EddCustomFaviconVars.style,
        type: EddCustomFaviconVars.shape,
        animation: EddCustomFaviconVars.animation
    });

    favicon.badge(EddCustomFaviconVars.count);

    jQuery('body').on('click.eddAddToCart', '.edd-add-to-cart', function () {
        if (typeof window.count === 'undefined') {
            window.count = parseInt(EddCustomFaviconVars.count, 10) + 1;
        } else {
            window.count = window.count + 1;
        }

        favicon.badge(window.count);
    });
});
