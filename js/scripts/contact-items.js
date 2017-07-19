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

        $(contactCol).css('width', itemSize(0.9));
        $(contactCol).css('height', itemSize(0.9));
        $(contactCol).css('padding-left', '0.5rem');
        $(contactCol).css('padding-right', '0.5rem');

        setItemSize(0.9);

        if ($(window).width() < 320) {
            $(contactCol).css('width', '96%');

            $(contactCol).css('height', itemSize(1));
            setItemSize(0.85);
        }

        if ($(window).width() > 319 && $(window).width() < 721) {
            $(contactCol).css('width', '48%');
            $(contactCol).css('height', itemSize(1));
            setItemSize(1);
        }

        if ($(window).width() > 479 && $(window).width() < 560) {
            /*$(contactCol).css('width', '24%');
            $(contactCol).css('height', itemSize(1));
            setItemSize(1);*/
        }

        if ($(window).width() > 720) {
            $(contactCol).css('width', '24.8%');
            $(contactCol).css('height', itemSize(1));
            setItemSize(1);
        }
    }

    contactItemResize();

    $(window).resize(function () {
        contactItemResize()
    });

}());