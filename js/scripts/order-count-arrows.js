(function ($) {
    setTimeout(function () {
        orderCount();
    }, 1000);
})(jQuery);

function orderCount() {
    $('.num-of-items-wrapper').on('click', '.num-of-items-min', function () {


        $new_val = parseInt($(this).parent().find('.count').val()) - 1;

        console.log($(this).attr('id'));

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


