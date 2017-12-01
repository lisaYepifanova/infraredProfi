(function ($) {
    function addServiceLinkField($id, $btn) {
        $new_field = '<div class="service-link-item box-small-mb"> \
            <label for="link-title-'+$id+'">Link title:</label> \
            <input type="text" id="link-title-'+$id+'" class="box-small-mb" name="footer_service_links['+$id+'][title]" value=""> \
            <label for="link-path-'+$id+'">Link path:</label> \
            <input type="text" id="link-path-'+$id+'"  name="footer_service_links['+$id+'][link]" value=""> \
            <input type="hidden" name="footer_service_links['+$id+'][id]"  value="' + $id +'">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-service-link').on('click', function () {
        $id = $('#max_id').val();
        addServiceLinkField(parseInt($id) + 1, this);
    });
})(jQuery);
