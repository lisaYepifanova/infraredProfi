$(function () {

    function recalcPosition($topPos) {
        $top = $(document).scrollTop(); //scrolled pixels from top
        $pip = $('.contacts').offset().top; //pixels from the contacts to the top
        $mtop = $('.contacts').css('margin-top');
        $height = $('.product-menu').outerHeight(); //height of the menu
        $pip = $pip - parseInt($mtop) * 2;
        if ($top > $topPos && $top < $pip - $height) {
            $('.product-menu').addClass('fixed').removeAttr("style").css({'position': 'fixed'});
        }
        else if ($top > $pip - $height) {
            $('.product-menu').removeClass('fixed').css({'position': 'absolute', 'bottom': '16px'});
        }
        else {
            $('.product-menu').removeClass('fixed').removeAttr("style").css({'position': 'fixed'});
        }
    }

    function productMenuScroll() {
        $topPos = $('.product-menu').offset().top; //pixels from the menu to the top

        //$rightHeight = $('.product-main').css('height');

        //$menuHeight = $('.product').css('height');
        $('.product-menu-wrapper').css('height', $menuHeight);
        recalcPosition($topPos);
        $(window).scroll(function () {
            recalcPosition($topPos);
        });
    }

    function setMenuWidth() {
        $menuMaxWidth = (parseInt($(document).width()) - parseInt($('.container').width())) / 2;
        $('.product-menu').css('max-width', $menuMaxWidth + 'px');
        $menuWidth = parseInt($('.product-menu').css('width'));
        $margin = ($menuMaxWidth - $menuWidth) / 2;
        if (parseInt($(document).width()) > 1366) {
            $('.product-menu').css('margin-left', $margin + 'px');
            $('.product-menu').css('margin-right', $margin + 'px');
        }

    }

    window.onload = function () {
        if ($('.product-menu-wrapper').length !== 0) {
            productMenuScroll();
            setMenuWidth();

            $(window).scroll(function () {
                //$menuHeight = $('.product').css('height');
                //$('.product-menu-wrapper').css('height', $menuHeight);
                setMenuWidth();
            });

            $(window).resize(function () {
                //$menuHeight = $('.product').css('height');
               // $('.product-menu-wrapper').css('height', $menuHeight);
                setMenuWidth();
            });

        }

    }
});
