(function ($) {
    $('.delete-prod-image').on('click', function() {
        $classes = $(this).attr('class');
        $classes_arr = $classes.split(' ');

        $itemClass = $classes_arr[1];

        $split = $itemClass.split('-');
        $index = $split[$split.length - 1];

        console.log($index);

        $(".image-item-" +  $index).after("<input type='hidden' name='del-image[]' value='"+$index+"'> ");

        $(".image-item-" +  $index).remove();
    });


        $('.delete-bild-image').on('click', function() {
        $classes = $(this).attr('class');
        $classes_arr = $classes.split(' ');

        $itemClass = $classes_arr[1];

        $split = $itemClass.split('-');
        $index = $split[$split.length - 1];

        console.log($index);

        $(".edit-gallery-image-item-" +  $index).after("<input type='hidden' name='del-image[]' value='"+$index+"'> ");

        $(".edit-gallery-image-item-" +  $index).remove();
    });
})(jQuery);