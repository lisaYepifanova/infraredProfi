(function () {
    function setMLogoSize() {
        $window = parseInt($(window).width());
        $paddings = parseInt($('.header-wrapper').css('padding-left')) + parseInt($('.header-wrapper').css('padding-right'));
        $menuButtonPadding = parseInt($('.menu-link-button').css('padding-right')) + parseInt($('.menu-link-button').css('padding-left'));
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


        $w = $window - $menu - $social - $logo_padd - $hw - 32 - 15;

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


    var addEvent = function (object, type, callback) {
        if (object == null || typeof(object) == 'undefined') return;
        if (object.addEventListener) {
            object.addEventListener(type, callback, false);
        } else if (object.attachEvent) {
            object.attachEvent("on" + type, callback);
        } else {
            object["on" + type] = callback;
        }
    };

    addEvent(window, "resize", function (event) {
        if (parseInt($(window).width()) < 460 ) {
            $('.site-logo-wrapper img').css('width', setMLogoSize() + 'px');
        } else if (parseInt($(window).width()) < 992) {
            $('.site-logo-wrapper img').css('width', '320px');
        }
        else if (parseInt($(window).width()) < 1400) {
            $('.site-logo-wrapper img').css('width', setDLogoSize() + 'px');
        } else {
            $('.site-logo-wrapper img').css('width', '480px');
        }
    });

    function getLogoOffset() {
        return parseInt($('.site-logo-wrapper img').offset().left) + 'px';
    }

    if ($('.site-logo-wrapper img').offset().left > 0) {
        $('.header-top-line').css('padding-left', getLogoOffset);
        $('.header-top-line').css('padding-right', getLogoOffset);
    } else {
        $('.header-top-line').css('padding-left', '0px');
        $('.header-top-line').css('padding-right', '0px');
    }


    addEvent(window, "resize", function (event) {
        console.log($(window).width());
        if ($('.site-logo-wrapper img').offset().left > 0) {
            $('.header-top-line').css('padding-left', getLogoOffset);
            $('.header-top-line').css('padding-right', getLogoOffset);
        } else {
            $('.header-top-line').css('padding-left', '0px');
            $('.header-top-line').css('padding-right', '0px');
        }
    });

}());
