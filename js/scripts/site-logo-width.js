(function () {
    function setMLogoSize() {
        $window = parseInt($(window).width());
        $paddings = parseInt($('.header-wrapper').css('padding-left')) + parseInt($('.header-wrapper').css('padding-right'));
        $menuButtonPadding = parseInt($('.site-logo-wrapper').css('padding-right')) + parseInt($('.site-logo-wrapper').css('padding-left'));
        $menuButtonSize = parseInt($('.menu-link').width());
        $w = $window - $paddings - $menuButtonSize - $menuButtonPadding;

        return $w;
    }

    function setDLogoSize() {
        $window = parseInt($(window).width());
        $menu = parseInt($('.header-menu-wrapper').width());
        $hw = parseInt($('.header-wrapper').css('padding-left')) + parseInt($('.header-wrapper').css('padding-right'));
        $social = parseInt($('.header-social-items-wrapper').width());
        $logo_padd = parseInt($('.site-logo-wrapper').css('padding-left')) + parseInt($('.site-logo-wrapper').css('padding-right'));


        $w = $window - $menu - $social - $logo_padd - $hw - 32;

        return $w;
    }


    if (parseInt($(window).width()) < 460) {
        $('.site-logo-wrapper img').css('width', setMLogoSize() + 'px');
    } else if (parseInt($(window).width()) < 992) {
        $('.site-logo-wrapper img').css('width', '320px');
    }
    else if (parseInt($(window).width()) < 1400) {
        $('.site-logo-wrapper img').css('width', setDLogoSize() + 'px');
    } else {
        $('.site-logo-wrapper img').css('width', '480px');
    }


    window.onresize = function () {
        if (parseInt($(window).width()) < 460) {
            $('.site-logo-wrapper img').css('width', setMLogoSize() + 'px');
        } else if (parseInt($(window).width()) < 992) {
            $('.site-logo-wrapper img').css('width', '320px');
        }
        else if (parseInt($(window).width()) < 1400) {
            $('.site-logo-wrapper img').css('width', setDLogoSize() + 'px');
        } else {
            $('.site-logo-wrapper img').css('width', '480px');
        }
    };

}());
