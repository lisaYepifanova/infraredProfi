function arrowsRotation($arr) {
    $($arr).on('click', function () {
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
    arrowsRotation('.faq-item-title');
});

