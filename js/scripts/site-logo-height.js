(function () {
     $h = $('.page-header').css('height');
        $('.site-logo-wrapper').css('height', $h);
    $('.page-header').on('resize', function () {
        $h = $('.page-header').css('height');
        $('.site-logo-wrapper').css('height', $h);
    });
}());