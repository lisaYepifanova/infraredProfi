(function () {
    function changeMainHeight() {
         $('.download-page').css('minHeight', 'unset');
         $('.faq-content-wrapper').css('minHeight', 'unset');
        $contactH = parseInt($('.contacts').css('height')) + parseInt($('.contacts').css('margin-top')) + parseInt($('.contacts').css('margin-bottom'));
        $footerH = parseInt($('footer').css('height'));
        $headerMargin = parseInt($('.page-header').css('margin-top'));
        $winH = parseInt($(document).height());

        $mainHeight = $winH - $headerMargin - $footerH - $contactH + 5;
        $mainHeight += 'px';


        $('.download-page').css('minHeight', $mainHeight);
        $fHeight = parseInt($mainHeight) - parseInt($('.page-header').css('height')) - parseInt($('.page-header').css('margin-bottom'));
        $('.faq-content-wrapper').css('minHeight', $fHeight);

    }

    changeMainHeight();
    $(window).resize(function () {
        if (parseInt($(window).width()) > 768) {
            changeMainHeight();
        }
    });
}());
