(function ($) {
    function addProdImageField($index) {
        $new_field = '<div class="box-small-margin product-image-block prod-image-block-' + $index + ' "> \
            <div> \
              <img id="prod_image-' + $index + '" \
                   src="" \
                   alt=""/> \
              <a  class="close-prod_image-' + $index + '"> \
                <button type="button">Reset</button> \
              </a> \
            </div> \
            <input type="file" class="form-control prod-img" id="prod_image_field-' + $index + '" \
                   name="prod_image[' + $index + ']"> \
            <input type="hidden" name="prod_image[' + $index + '][id]"  value="' + $index + '"> \
          </div>';


        $('.product-image-block').last().after($new_field);
    }


    $('.add-new-product-image-button').on('click', function () {
        $lastId = $('.product-image-block .prod-img').last().attr('id');

        $split = $lastId.split('-');
        $index = $split[$split.length - 1];

        addProdImageField(parseInt($index) + 1);

        //show
        $currentInd = parseInt($index) + 1;

        $("#prod_image_field-" + $currentInd).change(function () {
    readURL(this, '#prod_image-' + $currentInd, '.close-prod_image-' + $currentInd);
});

        //reset

        $(".close-prod_image-" + $currentInd).on('click', function () {
            $('#prod_image-' + $currentInd).attr('src', '#');
            $('#prod_image_field-' + $currentInd).val('');
            $(".close-prod_image-" + $currentInd).css('display', 'none');
        });


    });


})(jQuery);
