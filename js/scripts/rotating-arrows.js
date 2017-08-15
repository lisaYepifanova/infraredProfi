function arrowsRotation($arr) {
    $($arr).on('click', function () {

        if($(this).hasClass('opened')) {
            $(this).removeClass('opened');
            $($arr).addClass('closed');

        } else {
            $($arr).removeClass('opened');
            $(this).addClass('opened');
            $(this).removeClass('closed');
        }

    });
}

$(document).ready(function () {
    arrowsRotation('.faq-item-title');
});

