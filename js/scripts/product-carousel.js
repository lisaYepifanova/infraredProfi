$('#product-carousel').carousel({
    //interval: 4000,
    //pause: "hover"
});


$('#homepageGalleryCarousel').carousel({
    pause: true,
    interval: false
});

$('.homepage-gallery-carousel').carousel({
    pause: true,
    interval: false
});

$prodItem = '#product-carousel .item .thumb';
$prodMidItem = '#product-carousel .item .thumb:nth-child(2)';
$prodActItem = '#product-carousel .item.active .thumb';

if ($($prodActItem).length > 2) {
    $($prodMidItem).css('transform', 'scale(1.85)');
    $($prodMidItem).css('z-index', '999');
    $($prodMidItem).css('position', 'relative');
    $($prodMidItem).css('box-shadow', 'rgb(251, 251, 251) 0px 0px 20px 9px');
    $($prodMidItem).css('border', '1px solid #dcdcdc52');
} else {
    $('#product-carousel .item .thumb').css('transform', 'scale(1)');
    $('#product-carousel .item .thumb').css('z-index', '1');
    $($prodMidItem).css('box-shadow', '0');
    $($prodMidItem).css('border', '0');
}


$('#product-carousel').on('slide.bs.carousel', function () {
    $($prodItem).css('transform', 'scale(1)');
    $($prodItem).css('z-index', '1');
     $($prodMidItem).css('box-shadow', '0');
     $($prodMidItem).css('border', '0');
});


$('#product-carousel').on('slid.bs.carousel', function () {
    if ($('#product-carousel .item.active .thumb').length > 2) {
        $('.item .thumb:nth-child(2)').css('transform', 'scale(1.85)');
        $('.item .thumb:nth-child(2)').css('z-index', '999');
        $('.item .thumb:nth-child(2)').css('position', 'relative');
        $('.item .thumb:nth-child(2)').css('box-shadow', 'rgb(251, 251, 251) 0px 0px 20px 9px');
        $('.item .thumb:nth-child(2)').css('border', '1px solid #dcdcdc52');
    } else {
        $('.item .thumb').css('transform', 'scale(1)');
        $('.item .thumb').css('z-index', '1');
         $('.item .thumb:nth-child(2)').css('box-shadow', '0');
         $('.item .thumb:nth-child(2)').css('border', '0');
    }

});
