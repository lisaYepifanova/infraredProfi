(function () {
    function leftSideAppear($mainReg, $sideBlock, $startM) {
        if (document.getElementById($mainReg) !== null) {
            var target = $($sideBlock);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            $($sideBlock).css('margin-left', $startM);
            $($sideBlock).css('opacity', '0');

            var scrollToElem = targetPos - winHeight;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {

                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    console.log('test');
                    $($sideBlock).animate({
                        marginLeft: '0',
                        opacity: '1'

                    }, 2000, 'easeOutCirc');
                }


            });
            if (winScrollTop > scrollToElem + $(window).height() * 0.5) {
                $($sideBlock).animate({
                    marginLeft: '0',
                    opacity: '1'
                }, 2000, 'easeOutCirc');
            }
        }
    }

    function rightSideAppear($mainReg, $sideBlock, $startM) {
        if (document.getElementById($mainReg) !== null) {
            var target = $($sideBlock);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            $($sideBlock).css('margin-right', $startM);
            $($sideBlock).css('opacity', '0');

            var scrollToElem = targetPos - winHeight;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {
                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    $($sideBlock).animate({
                        marginRight: '0',
                        opacity: '1'

                    }, 2000, 'easeOutCirc');
                }


            });
            if (winScrollTop > scrollToElem + $(window).height() * 0.5) {
                $($sideBlock).animate({
                    marginRight: '0',
                    opacity: '1'
                }, 2000, 'easeOutCirc');
            }


        }

    }


    $mainTwoSideReg = 'technologyPage';

    if ($(window).width() > 767) {
        leftSideAppear($mainTwoSideReg, '.comparison-title-left', '-50%');
        rightSideAppear($mainTwoSideReg, '.comparison-title-right', '-50%');
        leftSideAppear($mainTwoSideReg, '.left-img-comparison-row .comparison-img img', '-50%');
        leftSideAppear($mainTwoSideReg, '.left-img-comparison-row .comparison-text', '50%');

        leftSideAppear($mainTwoSideReg, '.right-img-comparison-row .comparison-img img', '50%');
        leftSideAppear($mainTwoSideReg, '.right-img-comparison-row .comparison-text', '-50%');

        leftSideAppear($mainTwoSideReg, '.convect-house-block', '-50%');
        rightSideAppear($mainTwoSideReg, '.infrared-house-block', '-50%');
    }
}());