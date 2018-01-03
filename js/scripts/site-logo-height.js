(function () {
    function setLogoSize() {
        $window = parseInt($(window).width());
        $paddings = parseInt($('.header-wrapper').css('padding-left')) + parseInt($('.header-wrapper').css('padding-right'));
        $menuButtonPadding = parseInt($('.menu-link-button').css('padding-right'));
        $menuButtonSize = parseInt($('.menu-link').width());
        $w = $window - $paddings - $menuButtonSize - $menuButtonPadding ;

        return $w;
    }


    if (parseInt($(window).width()) < 460) {
        $('.site-logo-wrapper img').css('width', setLogoSize() + 'px');
    } else {
        $('.site-logo-wrapper img').css('width', '360px');
    }


 window.onresize =  function () {
        if (parseInt($(window).width()) < 460) {
    console.log(parseInt($(window).width()));
            $('.site-logo-wrapper img').css('width', setLogoSize() + 'px');
        } else {
            $('.site-logo-wrapper img').css('width', '360px');
        }
    };

}());
