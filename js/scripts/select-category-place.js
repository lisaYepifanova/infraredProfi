(function ($) {
    if($('#parent_id').length) {
        $('#parent_id').on('change', function () {
            $('.add-category-place .select-place-category').css('display', 'none');
            $('.add-category-place .select-place-category').attr('disabled', true);
            $id = $( "#parent_id option:selected" ).val();

$('.add-category-place .select-place-category.category-'+$id).css('display', 'block');
 $('.add-category-place .select-place-category.category-'+$id).removeAttr('disabled');
        });
    }
})(jQuery);