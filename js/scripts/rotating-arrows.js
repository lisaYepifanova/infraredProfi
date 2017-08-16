function arrowsFaqRotation($accTitle, $tex) {
    $($accTitle).on('click', function () {
        if ($(this).hasClass('opened')) {
            $(this).removeClass('opened');
            $($accTitle).addClass('closed');
        } else {
           $('html, body').animate({scrollTop: parseInt($(this).parent().prev().offset().top) + parseInt($(this).parent().prev().children($accTitle).css('height'))  + 'px' },1500);
            $($accTitle).removeClass('opened');
            $(this).addClass('opened');
            $(this).removeClass('closed');
        }
    });
}

function arrowsDocRotation($accTitle, $tex) {
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
    arrowsFaqRotation('.faq-page .faq-item-title', '.faq-page .faq-item-title + div');
    arrowsDocRotation('.download-page .faq-item-title', '.download-page .faq-item-title + div');
});

