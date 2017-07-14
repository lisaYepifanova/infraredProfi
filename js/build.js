(function () {

    var contactCol = ".contacts .contact-item-wrapper";
    var contactItem = ".contacts .contact-item";

    function itemSize(ind) {
        var itemWidth = parseInt($(contactCol).css("width"));
        var contactPaddingL = parseInt($(contactCol).css('padding-left'));
        var contactPaddingR = parseInt($(contactCol).css('padding-right'));

        return ( itemWidth - contactPaddingL - contactPaddingR) * ind + "px"
    }

    function setItemSize(ind) {
        $(contactItem).css('width', itemSize(ind));
        $(contactItem).css('height', itemSize(ind));
    }

    function contactItemResize() {

        $(contactCol).css('width', itemSize(0.85));
        $(contactCol).css('height', itemSize(0.85));
        setItemSize(0.85);

        if ($(window).width() < 320) {
            $(contactCol).css('width', '96%');

            $(contactCol).css('height', itemSize(1));
            setItemSize(0.85);
        }

        if ($(window).width() > 320 && $(window).width() < 480) {
            $(contactCol).css('width', '48%');
            $(contactCol).css('height', itemSize(0.75));
            setItemSize(0.75);
        }

        if ($(window).width() > 480 && $(window).width() < 560) {
            $(contactCol).css('width', '24%');
            $(contactCol).css('height', itemSize(0.9));
            setItemSize(0.9);
        }

        if ($(window).width() > 560) {
            $(contactCol).css('width', '25%');
            $(contactCol).css('height', itemSize(0.75));
            setItemSize(0.75);
        }
    }

    contactItemResize();

    $(window).resize(function () {
        contactItemResize()
    });

}());;;// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
;var hammer = new Hammer(document.querySelector('.carousel'));
var $carousel = $(".carousel").carousel({"interval": 0});
hammer.get("swipe");
hammer.on("swipeleft", function () {
    $carousel.carousel("next");
});
hammer.on("swiperight", function () {
    $carousel.carousel("prev");
});
