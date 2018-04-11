(function ($) {
    function addSocialField($id, $btn) {
        $new_field = '<div class="social-item box-mid-margin"> \
            <div class="social-alt"> \
            <label for="social-item-alt-' + $id + '">Link alt:</label>\
            <input type="text" id="social-item-alt-' + $id + '" class="" name="social[' + $id + '][alt]" value=""> </div>\
            <div class="social-path"> \
            <label for="social-item-path-'+$id+'">Link path:</label>\
            <input type="text" id="social-item-path-'+$id+'" name="social['+$id+'][link]" value=""></div>\
            <div class="box-small-margin social-item-image-edit social-image-item-'+$id+'">\
            <div>\
            <img id="social_image-'+$id+'" src="" alt="">\
            <a class="close-social-image close-social_image-'+$id+'">\
            <button type="button">Reset</button>\
            </a>\
            </div>\
            <input type="file" class="form-control social-img" id="social_image_field-'+$id+'" name="social_image['+$id+']">\
            <input type="hidden" name="social_image['+$id+'][id]" value="'+$id+'">\
            </div>\
            <input type="hidden" name="social['+$id+'][id]" value="'+$id+'"> </div>';

        $($btn).prev().after($new_field);


        $("#social_image_field-" + $id).change(function (x) {
        return function () {
            readURL(this, '#social_image-' + x, '.close-social_image-' + x);
        }
    }($id));


            $(".close-social_image-" + $id).on('click', function (x) {
        return function () {
            $('#social_image-' + x).attr('src', '#');
            $('#social_image_field-' + x).val('');
            $(".close-social_image-" + x).css('display', 'none');
        }
    }($id));
    }

    $('.add-new-social-item').on('click', function () {
        $id = $('#max_id_social').val();
        addSocialField(parseInt($id) + 1, this);
        $('#max_id_social').val(parseInt($id) + 1);
    });
})(jQuery);
