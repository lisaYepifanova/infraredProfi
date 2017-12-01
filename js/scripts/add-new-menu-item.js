(function ($) {
    function addMenuItemField($id, $btn) {
        $new_field = '<div class="modal-menu-item box-small-mb"> \
            <label for="menu-item-title-'+$id+'">Link title:</label> \
            <input type="text" id="menu-item-title-' + $id + '" class="" name="modal_menu[' +$id + '][title]" value="">\
            <label for="menu-item-path-'+$id+'">Link path:</label> \
            <input type="text" id="menu-item-path-' + $id + '"  name="modal_menu[' + $id + '][link]" value=""> \
            <input type="hidden" name="modal_menu[' + $id +'][id]"  value="' + $id +'">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-menu-item').on('click', function () {
        $id = $('#max_id_menu').val();
        addMenuItemField(parseInt($id) + 1, this);
    });
})(jQuery);
