(function ($) {
    function addBildmotiveItemField($id, $btn) {

        $new_field = '<div class="row edit-gallery-image-item edit-gallery-image-item-' + $id + ' \
            box-mid-margin"> \
              <div \
                  class=" col-sm-6 product-image-block prod-image-block-' + $id + ' \
                  image-item-' + $id + '"> \
                <div> \
                  <img id="prod_image-' + $id + '"\
                       src=""\
                       alt=""/>\
                  <a class="close-prod close-bild_image-' + $id + '">\
                    <button type="button">Reset</button>\
                  </a>\
                  <a class="delete-bild-image del-bild-' + $id + '">\
                    <button type="button">Delete</button>\
                  </a>\
                </div>\
                <input type="file" class="form-control prod-img"\
                       id="prod_image_field-' + $id + '"\
                       name="prod_image[' + $id + '][image]">\
                <input type="hidden"\
                       name="prod_image[' + $id + '][id]"\
                       value="' + $id + '">\
              </div>\
              <div class="product-image-block  col-sm-6">\
                <label for="prod_image[' + $id + '][name]">\
                  Name </label>\
                <input type="text"\
                       id="prod_image[' + $id + '][name]"\
                       name="prod_image[' + $id + '][name]">\
              </div>\
            </div>';

        $($btn).prev().after($new_field);

        $("#prod_image_field-" + $id).change(function (x) {
            return function () {
                readURL(this, '#prod_image-' + x, '#close-bild_image-' + x);
            }
        }($id));
    }

    $('.add-new-bildmotive-image-button').on('click', function () {
        $id = $('#max_gallery_id').val();
        addBildmotiveItemField(parseInt($id) + 1, this);
        $('#max_gallery_id').val(parseInt($id) + 1);
    });


    for (var i = 1; i <= 200; i++) {
        $(".close-bild_image-" + i).on('click', function (x) {
            return function () {
                $('#prod_image-' + x).attr('src', '#');
                $('#prod_image_field-' + x).val('');
                $(".close-bild_image-" + x).css('display', 'none');
                console.log('close' + x);
            }

        }(i));
    }


})(jQuery);
