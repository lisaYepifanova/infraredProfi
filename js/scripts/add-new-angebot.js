(function ($) {
    function addAngebotField($id, $btn) {
        $new_field = '<div class="property-item property-item' + $id + '"> \
              <div class="property-item-image"></div> \
              <div> \
                <img id="imageang' + $id + '" \
                     src="" \
                     alt=""/> \
                <a href="#" class="close-img-ang_' + $id + '"> \
                  <button type="button">Reset</button> \
                </a> \
              </div> \
              <input type="file" class="form-control" id="service_ang' + $id + '" \
                     name="ang_image' + $id +'"> \
              <span class="help-block"> Max filesize is 400Kb</span> \
              <h4 class="property-item-title"><textarea class="bg-field full-textarea" name="item-title_' + $id + '"></textarea></h4> \
              <p class="property-item-description"><textarea class="bg-field full-textarea" name="item-desc_' + $id + '"></textarea></p> \
              </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-angebot-button').on('click', function () {
        $id = $('#max_id_angebot').val();
        addAngebotField(parseInt($id) + 1, this);
    });
})(jQuery);
