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
        $('#max_id').val($id+1);
    });

    ///////

        function addLinkField($id, $btn) {
        $new_field = '<div class="service-link-item box-mid-margin"> \
            <label for="link-title-'+ $id +'">Link title:</label> \
            <input type="text" id="link-title-' + $id + '" class="" name="footer_links[' + $id + '][title]" > \
            <label for="link-path-' + $id + '">Link path:</label> \
            <input type="text" id="link-path-' + $id + '"  name="footer_links[' + $id + '][link]" > \
            <input type="hidden" name="footer_links[' + $id + '][id]"  value="' + $id + '"> \
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-link').on('click', function () {
        $id = $('#max_link_id').val();
        addLinkField(parseInt($id) + 1, this);
        $('#max_link_id').val(parseInt($id)+1);
    });

            ///////

        function addHeaderLinkField($id, $btn) {
        $new_field = '<div class="header-link-item box-mid-margin"> \
            <label for="header-link-title-' + $id + '">Link title:</label> \
            <input type="text" id="header-link-title-' + $id + '" class="" name="header_links[' + $id + '][title]"> \
            <label for="header-link-path-'+$id+'">Link path:</label> \
            <input type="text" id="header-link-path-' + $id + '"  name="header_links[' + $id + '][link]"> \
            <input type="hidden" name="header_links[' + $id + '][id]"  value="' + $id + '">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-header-link').on('click', function () {
        $id = $('#max_header_link_id').val();
        addHeaderLinkField(parseInt($id) + 1, this);
        $('#max_header_link_id').val($id+1);
    });
})(jQuery);
