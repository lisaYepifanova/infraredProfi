(function () {

    function showArrow($element) {
        $($element).find('.arrow-down').css('display', 'block');
    }

    function hideArrow($element) {
        $($element).find('.arrow-down').css('display', 'none');
    }

    function overflowingEffect($element) {
        //if overflowing
        if ($($element).prop('scrollHeight') > $($element).height() && $($element).css('max-height') !== 'none') {
            showArrow($element);
        } else {
            hideArrow($element);
        }
    }

    $arrow = '.arrow-down';

    function technologyTextHover($element) {
        if ($($element).length !== 0) {

            console.log ($element + ' scroll ' + $($element).prop('scrollHeight'));
            console.log ($element + ' height ' + $($element).height());
            if ($($element).prop('scrollHeight') <= $($element).height() + 2) {
                hideArrow($element);
            }
            overflowingEffect($element);
            $($element).on('mouseenter', function () {
                $(this).css('max-height', 'none');
                overflowingEffect(this, $arrow);
            });

            $($element).on('mouseleave', function () {
                $(this).css('max-height', '370px');
                overflowingEffect(this, $arrow);
            });
        }
    }

    technologyTextHover('.comparison-wrapper-1');
    technologyTextHover('.comparison-wrapper-2');


}());