$l = $('.carousel-showmanymoveone .item').length;


$('#product-carousel').carousel({
    interval: 4000
});

if ($l < 4) {
    $('#product-carousel').carousel({interval: false});
}

$('.carousel-showmanymoveone .item').each(function () {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));


    if (next.next().length > 0) {
        next.next().children(':first-child').clone().appendTo($(this));
    }
    else if ($l > 2) {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
});
