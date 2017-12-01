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

        $($btn).prev().after($new_field);
    }

    $('.add-new-prop').on('click', function () {
        $id = $('#max_prop_id').val();
        addPropField(parseInt($id) + 1, this);
    });
})(jQuery);
