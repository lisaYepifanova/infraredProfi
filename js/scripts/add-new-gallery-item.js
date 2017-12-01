(function ($) {
    function addGalleryItemField($id, $btn) {
        $new_field = '<div class="item-wrapper-edit "> \
            <div class=""> \
              <img id="imagegallery_item_' + $id + '" \
                   src="" \
                   alt=""/> \
              <div id="close-gallery_item_' + $id + '"> \
                <button type="button">Reset</button> \
              </div> \
            </div> \
            <input type="file" class="form-control" \
                   id="gallery_item_' + $id + '" \
                   name="gallery[item_' + $id + ']"> \
            <span class="help-block"> Max filesize is 2mb</span> \
            <input type="hidden" name="gallery[item_' + $id + ']" value="' + $id + '"> \
            <div class="gallery-image-title"> \
            <label for="is-on-main-gallery-' + $id + '">Image title</label> \
            <input type="text" id="is-on-main-gallery-' + $id + '" name="img-title-main-gallery[item_' + $id + ']"> \
            </div> \
            <div class="is-on-main-item"> \
            <input type="checkbox" id="is-on-main-gallery-' + $id + '" name="is-on-main-gallery[item_' + $id + ']" > \
            <label for="is-on-main-gallery-' + $id + '">Is main image</label> \
            </div></div>';

        $($btn).prev().after($new_field);

         $("#gallery_item_" + $id).change(function (x) {
        return function () {
            readURL(this, '#imagegallery_item_' + x, '#close-gallery_item_' + x);
        }
    }($id));
    }

    $('.add-new-gallery-item').on('click', function () {
        $id = $('#max_gallery_id').val();
        addGalleryItemField(parseInt($id) + 1, this);
    });
})(jQuery);
