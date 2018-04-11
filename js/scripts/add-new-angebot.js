(function ($) {
    function addAngebotField($id, $btn) {

        $lang = $('.lang').val();

        if ($lang == '2') {
            $new_field = '<div class="property-item property-item' + $id + '"> \
              <div class="property-item-image"></div> \
              <div> \
                <img id="imageang' + $id + '" \
                     src="" \
                     alt=""/> \
                <a class="close-img-ang_' + $id + '"> \
                  <button type="button">Reset</button> \
                </a> \
              </div> \
              <input type="file" class="form-control" id="service_ang' + $id + '" \
                     name="ang_image[' + $id + ']"> \
              <span class="help-block"> Max filesize is 400Kb</span> \
              <h4 class="property-item-title"><textarea class="bg-field full-textarea" name="eng_item-title[' + $id + ']"></textarea></h4> \
              <p class="property-item-description"><textarea class="bg-field full-textarea" name="eng_item-desc[' + $id + ']"></textarea></p> \
              </div>';
        } else {
            $new_field = '<div class="property-item property-item' + $id + '"> \
              <div class="property-item-image"></div> \
              <div> \
                <img id="imageang' + $id + '" \
                     src="" \
                     alt=""/> \
                <a class="close-img-ang_' + $id + '"> \
                  <button type="button">Reset</button> \
                </a> \
              </div> \
              <input type="file" class="form-control" id="service_ang' + $id + '" \
                     name="ang_image[' + $id + ']"> \
              <span class="help-block"> Max filesize is 400Kb</span> \
              <h4 class="property-item-title"><textarea class="bg-field full-textarea" name="item-title[' + $id + ']"></textarea></h4> \
              <p class="property-item-description"><textarea class="bg-field full-textarea" name="item-desc[' + $id + ']"></textarea></p> \
              </div>';
        }


        $($btn).prev().after($new_field);

        $(".close-img-ang_" + $id).on('click', function (x) {
            return function () {
                $('#imageang' + x).attr('src', '');
                $('#service_ang' + x).val('');
                $(".close-img-ang_" + x).css('display', 'none');
            }
        }($id));

        $("#service_ang" + $id).change(function (x) {
            return function () {
                readURL(this, '#imageang' + x, '.close-img-ang_' + x);
            }
        }($id));

    }

    $('.add-new-angebot-button').on('click', function () {
        $id = $('#max_id_angebot').val();
        addAngebotField(parseInt($id) + 1, this);
    });
})(jQuery);
