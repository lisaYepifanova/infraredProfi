(function ($) {
    function addPhoneField($id, $btn) {
        $new_field = '<div class="phone-item box-small-mb"> \
            <label for="phone-title-'+$id+'">Text:</label> \
            <input type="text" id="phone-title-'+$id+'" name="phones['+$id+'][text]" value=""> \
            <label for="phone-num-'+$id+'">Phone:</label> \
            <input type="text" id="phone-num-'+$id+'"  name="phones['+$id+'][tel]" value=""> \
            <input type="hidden" name="phones[' + $id +'][id]"  value="' + $id +'">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-phone').on('click', function () {
        $id = $('#max_id_phone').val();
        addPhoneField(parseInt($id) + 1, this);
        $('#max_id_phone').val(parseInt($id) + 1);

    });
})(jQuery);
