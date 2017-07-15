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

        if ($(window).width() > 319 && $(window).width() < 480) {
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

}());