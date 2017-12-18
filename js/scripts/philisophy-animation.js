(function () {
    function smoothAppearance($mainRegion, $target, $startPos, $speed) {
        $($target).css('opacity', '0');
        if (document.getElementById($mainRegion) !== null) {
            var target = $($target);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            var scrollToElem = targetPos - winHeight + $(window).height() * $startPos;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {
                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    var ind = (winScrollTop - scrollToElem) / ($(window).height() * $startPos);

                    if (ind <= 1 && ind > $($target).css('opacity')) {
                        $($target).css('opacity', ind);
                    } else {
                        $($target).animate({
                            opacity: '1'
                        }, $speed, 'easeInCubic');
                    }
                }


            });

            if (winScrollTop > scrollToElem + $(window).height() * $startPos) {
                $($target).animate({
                    opacity: '1'
                }, $speed, 'easeInCubic');
            }
        }
    }

    function simpleSmooth($target, $speed) {
        if (document.getElementsByClassName($target) !== null) {
            $($target).css('opacity', '0');
            $($target).animate({
                opacity: '1'
            }, $speed, 'easeInCubic');
        }


    }

    $mainRegion = 'main-page';
    $target = "#main-page  .philosophy";
    $startPos = 0.3;
    $speed = 2000;

    smoothAppearance($mainRegion, $target, $startPos, $speed);

    $target = "#main-page  .homepage-header-title-wrapper";
    simpleSmooth($target, 2000);

    smoothAppearance('contactBlock', '#contactBlock .row', $startPos, $speed);

    //fur-handler

    $target = "#fur-handler-page  .registration-top-block";
    simpleSmooth($target, 2000);

    simpleSmooth('#fur-handler-page h3:nth-child(2)', 2000);

    smoothAppearance('fur-handler-page', '#fur-handler-page .registration-description', $startPos, $speed);
    smoothAppearance('fur-handler-page', '#fur-handler-page .right-side-wrapper', $startPos, 2000);

    //tech
    simpleSmooth('.technology-description', 2000);

    smoothAppearance('technologyPage', '#technologyPage .description-img-wrapper', $startPos, 2000);
    smoothAppearance('technologyPage', '#technologyPage .description-scheme-title', $startPos, 2000);


    if ($(window).width() < 768) {
        smoothAppearance('technologyPage', '.comparison-title-left', $startPos, 2000);
        smoothAppearance('technologyPage', '.left-img-comparison-row .comparison-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.left-img-comparison-row .comparison-text-wrapper', $startPos, 2000);

        smoothAppearance('technologyPage', '.comparison-title-right', $startPos, 2000);
        smoothAppearance('technologyPage', '.right-img-comparison-row .comparison-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.right-img-comparison-row .comparison-text-wrapper', $startPos, 2000);

        smoothAppearance('technologyPage', '.convect-house-title', $startPos, 2000);
        smoothAppearance('technologyPage', '.convect-house-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.convect-house-description', $startPos, 2000);

        smoothAppearance('technologyPage', '.infra-house-title', $startPos, 2000);
        smoothAppearance('technologyPage', '.infra-house-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.infra-house-description', $startPos, 2000);
    }

}());