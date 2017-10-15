function arrowsFaqRotation($accTitle) {
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

