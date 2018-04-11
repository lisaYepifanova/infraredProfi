(function ($) {
    function addAliasField($index) {
        $new_field = '<div class="alias-item container box-mid-margin" id="alias-' + $index + '">\
            <input type="hidden" name="items[' + $index + '][id]" value="' + $index + '">\
            <div class="alias-item-field-edit alias-id">Id ' + $index + '</div>\
            <div class="alias-item-field-edit alias-de"><label for="de-' + $index + '">DE: </label><input type="text" name="items[' + $index + '][de]" id="de-' + $index + '" value=""></div>\
            <div class="alias-item-field-edit alias-en"><label for="en-' + $index + '">EN: </label><input type="text" name="items[' + $index + '][en]" id="en-' + $index + '" value=""></div>\
            </div>';

        $('.alias-item').last().after($new_field);
         //CKEDITOR.replaceAll( 'answer_' + $index );
            $( "#max_id" ).val($index);
    }

    $('.add-new-alias').on('click', function () {
        $lastId = $('#max_id').val();

        addAliasField(parseInt($lastId) + 1);
    });


})(jQuery);
