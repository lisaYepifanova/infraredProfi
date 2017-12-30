(function () {
    function appearanceFromSides($mainReg, $itemsBlock, $itemsTitle, $itemReg, $leftPropertySide) {

        if (document.getElementById($mainReg) !== null) {
            var target = $($itemsBlock);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            //items properties at the start
            $($itemsTitle).css('margin-left', '50%');
            $($itemsTitle).css('opacity', '0');
            $($itemReg).css('margin-left', '50%');
            $($itemReg).css('opacity', '0');

            //left side properties at the start
            $($leftPropertySide).css('margin-left', '-50%');
            $($leftPropertySide).css('opacity', '0');


            var scrollToElem = targetPos - winHeight + $(window).height() / 4;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {
                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    $($itemsTitle).animate({
                        marginLeft: '0',
                        opacity: '1'

                    }, 1000, 'easeOutCirc');

                    $($leftPropertySide).animate({
                        marginLeft: '0',
                        opacity: '1'

                    }, 1000, 'easeOutCirc');


                    for (var i = 1; i < $($itemReg).length + 1; i++) {

                        var itemH = $($itemReg + i).height();
                        var itemTop = $($itemReg + i).offset().top;
                        var scrollToItem = itemTop - winHeight + itemH / 3;
                        if (winScrollTop > scrollToItem) {
                            $($itemReg + i).delay(200 * i).animate({
                                marginLeft: '0',
                                opacity: '1'

                            }, 1000, 'easeOutCirc');
                        }
                    }
                }


            });
             if (winScrollTop > scrollToElem + $(window).height() * 0.3) {
                    for (var i = 1; i < $($itemReg).length + 1; i++) {
                        $($itemReg + i).delay(200 * i).animate({
                            marginLeft: '0',
                            opacity: '1'
                        }, 1000, 'easeOutCirc');
                    }
                }
        }
    }
    $mainReg = 'main-page';
    $itemsBlock = '#main-page  .homepage-properties ';
    $itemsTitle = "#main-page  .property-title";
    $itemReg = "#main-page .property-item";
    $leftPropertySide = "#main-page .properties-side .left-side-bg";
    appearanceFromSides($mainReg, $itemsBlock, $itemsTitle, $itemReg, $leftPropertySide);

    $mainReg = 'fur-handler-page';
    $itemsBlock = '#fur-handler-page  .registration-properties ';
    $itemsTitle = "#fur-handler-page  .property-title";
    $itemReg = "#fur-handler-page .property-item";
    $leftPropertySide = "#fur-handler-page .properties-side .left-side-bg";
    appearanceFromSides($mainReg, $itemsBlock, $itemsTitle, $itemReg, $leftPropertySide);

}());