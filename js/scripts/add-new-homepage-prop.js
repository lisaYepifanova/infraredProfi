(function ($) {
    function addPropField($id, $btn) {
        $new_field = '<div class="property-item property-item_' + $id + '"> \
              <div class="property-item-image" style=""></div> \
            <div class="">\
              <img id="imageprop_image_' + $id + '" \
                   src="/" \
                   alt=""/> \
              <div id="close-prop_image_' + $id + '"> \
                <button type="button">Reset</button> \
              </div> \
            </div> \
            <input type="file" class="form-control" \
                   id="prop_image_' + $id + '" \
                   name="property[' + $id + '][image]" \
            > \
            <span class="help-block"> Max filesize is 400Kb</span> \
            <input type="hidden" \
                   name="property[' + $id + '][id]" \
                   value="' + $id + '"> \
            <h4 class="property-item-title"> \
              <input type="text" class="full-textarea" name="property[' + $id + '][title]" value=""> \
              </h4> \
              <p class="property-item-description"> \
              <textarea class="editor-area full-textarea" name="property[' + $id + '][description]"> \
              </textarea></p> \
              </div>';


        $($btn).before($new_field);

        $("#prop_image_" + $id).change(function (x) {
            return function () {
                readURL(this, '#imageprop_image_' + x, '#close-prop_image_' + x);
            }
        }($id));

        $("#close-prop_image_" + $id).on('click', function (x) {
            return function () {
                $('#imageprop_image_' + x).attr('src', '');
                $('#prop_image_' + x).val('');
                $("#close-prop_image_" + x).css('display', 'none');
            }
        }($id));


    }

    $('.add-new-prop').on('click', function () {
        $id = $('#max_prop_id').val();
        addPropField(parseInt($id) + 1, this);
        $('#max_prop_id').val(parseInt($id) + 1);
    });
})(jQuery);
