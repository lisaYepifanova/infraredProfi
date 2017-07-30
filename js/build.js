$l = $('.carousel-showmanymoveone .item').length;


$('#thumbcarousel').carousel({interval: false});
if ($l<4) {
  $('#thumbcarousel').carousel({interval: false});
}

$('.carousel-showmanymoveone .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));


  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else if ($l>3){
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
;$('.item-wrapper a').each(function () {
    $linkClass = $(this).attr('class').split(' ');
    $lastLinkClass = $linkClass[$linkClass.length - 1];

    $(this).on('click', function () {
        $('.image-nav-menu .large-item').removeClass('active');

        $linkClass = $(this).attr('class').split(' ');
        $lastLinkClass = $linkClass[$linkClass.length - 1];

        $('.homepage-gallery-carousel .item').each(function () {
            if ($(this).children('.' + $lastLinkClass).length !== 0) {
                $('.homepage-gallery-carousel .item').removeClass('active');
                $(this).addClass('active');
            }
        });
        $('.image-nav-menu .item.' + $lastLinkClass).addClass('active');
    });
});
;$('#homepageCarousel').carousel({
 interval: 5000,
 });;$('#imageNavMenu .close').on('click', function () {
    $("#imageNavMenu").modal('hide');
});;(function () {

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

}());;$(function () {
    var includes = $('[data-include]');
    jQuery.each(includes, function () {
        var file = 'views/' + $(this).data('include') + '.html';
        $(this).load(file);
    });
});;;$('.right-panel').on('mouseenter', function(){
    //$('#asideNavMenu').modal('show');
});

$('.aside-modal-dialog').on('mouseleave', function(){
    $('#asideNavMenu').modal('hide');
});
;// Avoid `console` errors in browsers that lack a console.
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
;$('.product-carousel').carousel({
    interval: 6000,
    pause: "hover"
});


$('#homepageGalleryCarousel').carousel({
    pause:true,
    interval:false
});

$('.homepage-gallery-carousel').carousel({
    pause:true,
    interval:false
});
;$(function () {

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

        $menuHeight = $('.product').css('height');
        $('.product-menu-wrapper').css('height', $menuHeight);
        recalcPosition($topPos);
        $(window).scroll(function () {
            recalcPosition($topPos);
        });
    }

    function setMenuWidth() {
        $menuWidth = parseInt($('.container').css('width')) * 0.25;
        $('.product-menu').css('width', $menuWidth + 'px');
    }

    window.onload = function () {
        if ($('.product-menu-wrapper').length !== 0) {
            productMenuScroll();
            setMenuWidth();

            $(window).scroll(function () {
                $menuHeight = $('.product').css('height');
                $('.product-menu-wrapper').css('height', $menuHeight);
                setMenuWidth();
            });

            $(window).resize(function () {
                $menuHeight = $('.product').css('height');
                $('.product-menu-wrapper').css('height', $menuHeight);
                setMenuWidth();
            });

        }

    }
});
;function arrowsRotation() {
    $('.faq-item-title').on('click', function () {
        if($(this).hasClass('opened')) {
            $(this).addClass('closed');
            $(this).removeClass('opened');
        } else {
            $(this).addClass('opened');
            $(this).removeClass('closed');
        }

    });
}

$(document).ready(function () {
    arrowsRotation();
});

;(function () {
    function sizeRect(i) {
        $('.row-' + i).on('click', function () {
            $('tr').removeClass('active-row');
            $('div').removeClass('active-rectangle');

            $('#row' + i + '.rectangle').addClass('active-rectangle');
            $('.row-' + i).addClass('active-row');
        });

        $('#row' + i).on('click', function () {
            $('tr').removeClass('active-row');
            $('div').removeClass('active-rectangle');
            $('.row-' + i).addClass('active-row');
            $('#row' + i + '.rectangle').addClass('active-rectangle');
        });
    }

    $row_num = $('.product-sizes tr').length;

    for (i = 1; i < $row_num; i++) {
        sizeRect(i);
    }


}());;function hammerSwipe($selector) {
    var hammer = new Hammer(document.querySelector($selector));
    var $carousel = $($selector).carousel({"interval": 5000});
    hammer.get("swipe");
    hammer.on("swipeleft", function () {
        $carousel.carousel("next");
    });
    hammer.on("swiperight", function () {
        $carousel.carousel("prev");
    });
}
if ($('.swipe-carousel').length !== 0) {
    hammerSwipe('.swipe-carousel');
}
if ($('#homepageGalleryCarousel').length !== 0) {
    var hammer = new Hammer(document.querySelector('#homepageGalleryCarousel'));
    var $car = $("#homepageGalleryCarousel").carousel({"pause":true,"interval":false});
    hammer.get("swipe");

    hammer.on("swipeleft", function () {
        $car.carousel("next");
    });
    hammer.on("swiperight", function () {
        $car.carousel("prev");
    });
}


$l = $('.carousel-showmanymoveone .item').length;
if ($l > 3) {
    var hammer = new Hammer(document.querySelector('#thumbcarousel'));
    var $carousel = $("#thumbcarousel").carousel({"interval": 0});
    hammer.get("swipe");

    hammer.on("swipeleft", function () {
        $carousel.carousel("next");
    });
    hammer.on("swiperight", function () {
        $carousel.carousel("prev");
    });
}
;(function () {

    function showArrow($element) {
        $($element).find('.arrow-down').css('display', 'block');
    }

    function hideArrow($element) {
        $($element).find('.arrow-down').css('display', 'none');
    }

    function overflowingEffect($element) {
        //if overflowing
        if ($($element).prop('scrollHeight') > $($element).height() && $($element).css('max-height') !== 'none') {
            showArrow($element);
        } else {
            hideArrow($element);
        }
    }

    $arrow = '.arrow-down';

    function technologyTextHover($element) {
        if ($($element).length !== 0) {

            console.log ($element + ' scroll ' + $($element).prop('scrollHeight'));
            console.log ($element + ' height ' + $($element).height());
            if ($($element).prop('scrollHeight') <= $($element).height() + 2) {
                hideArrow($element);
            }
            overflowingEffect($element);
            $($element).on('mouseenter', function () {
                $(this).css('max-height', 'none');
                overflowingEffect(this, $arrow);
            });

            $($element).on('mouseleave', function () {
                $(this).css('max-height', '370px');
                overflowingEffect(this, $arrow);
            });
        }
    }

    technologyTextHover('.comparison-wrapper-1');
    technologyTextHover('.comparison-wrapper-2');


}());