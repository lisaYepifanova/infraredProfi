(function ($) {
    function addHeaderPhoneField($id, $btn) {
        $new_field = '<div class="header-phone-item    box-mid-margin"> \
            <label for="header-phone-title-'+$id+'">Text:</label> \
            <input type="text" id="header-phone-title-'+$id+'" name="header_phones['+$id+'][text]" value=""> \
            <label for="header-phone-num-'+$id+'">Phone:</label> \
            <input type="text" id="header-phone-num-'+$id+'"  name="header_phones['+$id+'][tel]" value=""> \
            <input type="hidden" name="header_phones[' + $id +'][id]"  value="' + $id +'">\
          </div>';

        if($id == 1) {
            $($btn).parent().children('h4').after($new_field);
        } else {
            $($btn).prev().after($new_field);
        }

    }

    $('.add-new-header-phone').on('click', function () {
        $id = $('#max_id_header_phone').val();
        addHeaderPhoneField(parseInt($id) + 1, this);
        $('#max_id_header_phone').val(parseInt($id) + 1);
    });
})(jQuery);
