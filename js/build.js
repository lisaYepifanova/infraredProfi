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
;(function($) {
setTimeout(function () {

        $('tr').find('td .add-another-button').on('click', function () {
            $elem = $(this).parent().parent().clone();
            $elem.find('.add-another-button').remove();
            $currid = $elem.find('.count').attr('id');

            console.log($currid);

            $currclass = $elem.find('.count').attr('class').split(' ')[1];

            $parentClass = $(this).parent().parent().parent().attr('class');

            $numOfCurrElem = $('.'+$currclass).length;

            $elemId = $elem.find('.count').attr('id');
            $elem.find('.count').attr('id', $elemId + '_' + $numOfCurrElem);

            $elemName = $elem.find('.count').attr('name');
            $elem.find('.count').attr('name', $elemName + '_' + $numOfCurrElem);


            $tId = $elem.find('.has-thermostat').attr('id');
            $elem.find('.has-thermostat').attr('id', $tId + '_' + $numOfCurrElem);

            $tName = $elem.find('.has-thermostat').attr('name');
            $elem.find('.has-thermostat').attr('name', $tName + '_' + $numOfCurrElem);




            $elem.insertAfter($(this).parent().parent());
            orderCount();

        });

}, 100);

})(jQuery);;(function () {
    function disableSubmit(login, pass, pass_r) {
        if (login.length !== 0 && pass.length >= 8 && pass_r.length >= 8 && pass == pass_r) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
            console.log('attr added');

        }
    }

    function checkParams($elem) {
        var login = $('#login').val();
        var pass = $('#pass').val();
        var pass_r = $('#pass_r').val();

        if ($($elem).val().length !== 0 || (($elem == '#pass' || $elem == '#pass_r') && $($elem).val().length >= 8)) {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'none');
            $($elem).removeClass('red-field');
        } else {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'block');
            $($elem).addClass('red-field');
        }

        disableSubmit(login, pass, pass_r);

    }

    function errorField($elem) {
        if ($($elem).val().length === 0) {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'block');
            $($elem).addClass('red-field');
        } else {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'none');
            $($elem).removeClass('red-field');
        }
    }

    function checkLogin($elem) {
        var element = $elem.val();


        if (element.length !== 0) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
            console.log('attr added');

        }

        errorField($elem);
    }

    if ($('.handler-adding-form').length > 0) {
        disableSubmit($('.handler-adding-form #login').val(), $('.handler-adding-form #pass').val());

        $('.handler-adding-form #login').on('blur', function () {
            checkParams('.handler-adding-form #login');
        });

        $('.handler-adding-form #pass').on('blur', function () {
            checkParams('#pass');
        });

        $('.handler-adding-form #pass_r').on('blur', function () {
            checkParams('.handler-adding-form #pass_r');
        });
    }


    if ($('.handler-editing-form').length > 0) {
        $('.handler-editing-form #login').on('blur', function () {
            checkLogin('.handler-editing-form #login');
        });

        $('.handler-editing-form #pass_r').on('blur', function () {
            errorField('.handler-editing-form #pass_r');
        });

        $('.handler-editing-form #pass').on('blur', function () {
            errorField('.handler-editing-form #pass');
        });
    }


}());
;$('#homepageCarousel').carousel({
 interval: 5000,
 });;$('#imageNavMenu .close').on('click', function () {
    $("#imageNavMenu").modal('hide');
});

function closeModal($modal, $dialog) {
    $(document).mouseup(function (e) { // событие клика по веб-документу
    var div = $($dialog); // тут указываем ID элемента
    var mod = $($modal); // тут указываем ID элемента

    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
        mod.modal('hide');
    }
});
}

closeModal('#imageNavMenu', '#imageNavMenu .modal-dialog');
closeModal('.delete-item-modal', '.delete-item-modal .modal-dialog .modal-content');
;function closeImg(input) {


}

$(".close-img").on('click', function(){
    $('#image').attr('src', '#');
    $('#photo').val('');
    $('.close-img').css('display', 'none');
});
;(function () {

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

        if ($(window).width() < 390) {
            $(contactCol).css('width', '96%');

            $(contactCol).css('height', itemSize(1));
            setItemSize(0.85);
        }

        if ($(window).width() > 389 && $(window).width() < 721) {
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

}());;(function () {

    function checkPass(pass, passr) {
        if ($(pass).val().length >= 8) {
            $('#pass + .green-tick-icon').css('display', 'block');
        } else {
            $('#pass + .green-tick-icon').css('display', 'none');
        }

        if (($(pass).val() !== '' && $(passr).val() !== '') && $(pass).val() == $(passr).val()) {
            $('#pass_r + .green-tick-icon').css('display', 'block');
        } else {
            $('#pass_r + .green-tick-icon').css('display', 'none');
        }

    }

    if ($('#pass').length > 0) {
        $('#pass').on('blur', function () {
            checkPass($('#pass'), $('#pass_r'))
        });
    }


    if ($('#pass_r').length > 0) {
        $('#pass_r').on('blur', function () {
            checkPass($('#pass'), $('#pass_r'))
        });
    }


}());
;$(function () {
    var includes = $('[data-include]');
    jQuery.each(includes, function () {
        var file = 'views/' + $(this).data('include') + '.html';
        $(this).load(file);
    });
});;/*
function findLongestWord(str) {
  var longestWord = str.split(' ').sort(function(a, b) { return b.length - a.length; });
  return longestWord[0].length;
}

$lWord = findLongestWord("The quick brown fox jumped over the lazy dog");

function onTextChange($fsize, $len) {
    var textLength = $($lWord).text().length;
    var fontSize = Math.min($fsize, ($len / textLength) * $fsize);
    $($lWord).css('font-size', fontSize + 'px');
}

onTextChange(12, 1000);
    */;(function () {
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
;$('.right-panel').on('mouseenter', function(){
    //$('#asideNavMenu').modal('show');
});

$('.aside-modal-dialog').on('mouseleave', function(){
    //$('#asideNavMenu').modal('hide');
});
;if ($("div").is(".registration-form-sent")) {
    var container = $('html, body'),
        scrollTo = $('.registration-form-sent');

    $(window).load(function () {
        container.stop().animate({
            scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop()
        }, 2000, "easeOutCirc");
    });

}


;(function ($) {
    setTimeout(function () {
        // $('.num-of-items-wrapper').each(function () {
        orderCount();

        // });

    }, 1000);
})(jQuery);

function orderCount() {
    $('.num-of-items-wrapper').on('click', '.num-of-items-min', function () {
        $new_val = parseInt($(this).parent().find('.count').val()) - 1;
        if ($new_val >= 0) {
            $(this).parent().find('.count').val($new_val);
        }

    });

    $('.num-of-items-wrapper').on('click', '.num-of-items-max', function () {
        $new_val = parseInt($(this).parent().find('.count').val()) + 1;
        $(this).parent().find('.count').val($new_val);
    });
}

function numOfItemsValid(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}


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

        //$menuHeight = $('.product').css('height');
        $pip = $('.contacts').offset().top;
        $menuHeight = parseInt($(document).height()) - parseInt($pip);


        $('.product-menu-wrapper').css('height', $menuHeight);
        //recalcPosition($topPos);
        $(window).scroll(function () {
            //recalcPosition($topPos);
        });
    }

    function setMenuWidth() {
        $menuMaxWidth = (parseInt($(document).width()) - parseInt($('.container').width())) / 2 - 20;
        $('.product-menu').css('maxWidth', $menuMaxWidth + 'px');
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
;(function () {
    $textWrapper = '.product-full-description-wrapper';
    $textBlock = '.product-full-description-wrapper';
    $productArrow = '.product-full-description-wrapper .arrow-down';
    $container = $('html, body');

    if ( parseInt($('.product-full-description').css('height')) > "200"  ) {
        $($productArrow).on('click', function () {


            if ($($textWrapper).prop('scrollHeight') > $($textWrapper).height()) {
                $maxH = parseInt($($textWrapper).prop('scrollHeight')) + 50;
                $($textWrapper).animate({maxHeight: $maxH + 'px'}, 1200);
                $($productArrow).css('position', 'relative');
                $($productArrow).css('padding', '0');
                $($productArrow).css('transform', 'scaleY(-1)');

            } else {
                $($textWrapper).animate({maxHeight: '200px'}, 1200);
                $($productArrow).css('position', 'absolute');
                $($productArrow).css('padding', '1rem');
                $($productArrow).css('transform', 'scaleY(1)');

                $('html, body').animate({scrollTop: $('.product-description').offset().top}, 1200);
            }
        });
    } else {
        $($productArrow).css('display', 'none');
    }
}());
;function arrowsFaqRotation($accTitle) {
    $($accTitle).on('click', function () {
        $open_height = $('.price-list-content').height() + 20;
        if ($(this).hasClass('opened')) {
            $(this).removeClass('opened');
            $($accTitle).each(function () {
                $(this).removeClass('opened');
                $(this).addClass('closed');
            });
        } else {
            if ($('.opened').next().height() > 0) {
                 $open_height = $('.opened').next().height() + 20;
            }

            $($accTitle).each(function () {
                $(this).removeClass('opened');
                $(this).addClass('closed');
            });

            $(this).addClass('opened');
            $(this).removeClass('closed');


        }

        /* $(this).next().on('shown.bs.collapse', function () {
            */
            if ($(this).parent().prev().hasClass($accTitle)) {
                $('html, body').animate({scrollTop: parseInt($(this).parent().prev().offset().top) - $open_height + 'px'}, 300);
                console.log(parseInt($(this).parent().prev().offset().top));
            } else {
                $('html, body').animate({scrollTop: parseInt($(this).parent().offset().top) - $open_height + 'px'}, 300);
                console.log(parseInt($(this).parent().offset().top));
            }
        /* });*/
    });
}

function arrowsDocRotation($accTitle) {
    $($accTitle).on('click', function () {
        if ($(this).hasClass('opened')) {
            $(this).removeClass('opened');
            $($accTitle).addClass('closed');
        } else {
            $($accTitle).removeClass('opened');
            $(this).addClass('opened');
            $(this).removeClass('closed');
        }
    });
}

$(document).ready(function () {
    arrowsFaqRotation('.faq-page .faq-item-title');
    arrowsFaqRotation('.order-page .prod-item-title');
    arrowsDocRotation('.download-page .faq-item-title');
});

;function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
            $('.close-img').css('display', 'block');
        };

        reader.readAsDataURL(input.files[0]);
        console.log(input.files[0].size);
    } else {
        $('.close-img').css('display', 'none');
    }
}

$("#photo").change(function(){
    readURL(this);
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

    function overflowingEffect($element, $text) {
        //if overflowing
        if ($($element).prop('scrollHeight') > $($element).height()) {
            showArrow($element);
        } else {
            hideArrow($element);
        }
    }

    $arrow = '.arrow-down';

    function technologyTextHover($element, $child, $height) {
        if ($($element).length !== 0) {

            hideArrow($element);

            setInterval(function () {
                overflowingEffect($element, $child);
            }, 500);

            $($element).on('mouseenter', function () {
                $maxH = parseInt($($element).prop('scrollHeight')) + 20;

                $(this).animate({maxHeight: $maxH+'px'}, 500);
            });

            $($element).on('mouseleave', function () {
                $(this).animate({maxHeight: $height}, 500);
            });
        }
    }

    $height = "470px";
    technologyTextHover('.comparison-wrapper-1', '.comparison-wrapper-1 .comparison-text',$height);
    technologyTextHover('.comparison-wrapper-2', '.comparison-wrapper-2 .comparison-text',$height);

    $height = "300px";
    technologyTextHover('.convect-house-description', '.convect-house-description .comparison-text',$height);
    technologyTextHover('.infra-house-description', '.infra-house-description .comparison-text',$height);

}());