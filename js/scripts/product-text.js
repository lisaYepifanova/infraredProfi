(function () {
    $textWrapper = '.product-full-description-wrapper';
    $textBlock = '.product-full-description-wrapper';
    $productArrow = '.product-full-description-wrapper .arrow-down';
    $container = $('html, body');

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

            $('html, body').animate({scrollTop: $('.product-title').offset().top}, 1200);
        }
    });
}());
