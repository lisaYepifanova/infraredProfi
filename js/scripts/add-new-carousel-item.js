(function ($) {
    function addCarouselItemField($id, $btn) {
        $new_field = '<div class="item-edit"> \
        <div class="carousel-img-ed carousel-image-edit' + $id + '"> \
          <div class="prev-image"> \
            <img id="imagecarousel_image_' + $id + '" \
                 src="" \
                 alt=""/> \
            <div id="close-carousel_image_' + $id + '"> \
              <button type="button">Reset</button> \
            </div> \
          </div> \
          <input type="file" class="form-control" \
                 id="carousel_image_' + $id + '" \
                 name="carousel_image[carousel_image_' + $id + ']" \
          > \
          <span class="help-block"> Max filesize is 2mb</span> \
          <input type="hidden" \
                 name="carousel_image[carousel_image_' + $id + ']" \
                 value="' + $id + '"> \
          </div> </div>';

        $($btn).prev().after($new_field);

         $("#carousel_image_" + $id).change(function (x) {
        return function () {
            readURL(this, '#imagecarousel_image_' + x, '#close-carousel_image_' + x);
        }
    }($id));
    }

    $('.add-new-carousel-item').on('click', function () {
        $id = $('#max_carousel_id').val();
        addCarouselItemField(parseInt($id) + 1, this);
    });
})(jQuery);
