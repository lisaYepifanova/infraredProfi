(function ($) {
    $('.delete-file-item').on('click', function() {
        $classes = $(this).attr('class');
        $classes_arr = $classes.split(' ');

        $itemClass = $classes_arr[3];

        $split = $itemClass.split('-');
        $index = $split[$split.length - 1];

        $(".title-"+$index).remove();
        $("#answer-"+$index).remove();
    });
})(jQuery);