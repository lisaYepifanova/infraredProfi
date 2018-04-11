(function ($) {
    function addQuestionField($index, $btn) {
        $new_field = '<div class="faq-item panel box-mid-margin panel-default"> \
                    <h4 class="faq-item-title collapsed" \
                    data-parent="#accordion" \
                    data-toggle="collapse" \
                    data-target="#answer-' + $index + '" \
                    aria-expanded="false">\
                    <span class="glyphicon glyphicon-chevron-down arrow-down"> \
                     </span> \
                    <input type="text" placeholder="Question"\
                              name="item[' + $index + '][question]" \
                              class="full-textarea"></h4> \
                    <div  role="definition" id="answer-' + $index + '" \
                    class="faq-item-answer panel-collapse collapse " \
                    aria-expanded="false" \
                    style="height: 0px;"><textarea\
                        class="editor-area full-textarea answer_' + $index + '" \
                        name="item[' + $index + '][answer]" \
                       ></textarea> \
                       <input type="hidden" name="item[' +$index +'][id]"  value="' + $index + '"> \
                        </div> \
                        <a class="glyphicon glyphicon-trash delete-faq-item">Delete</a> \
                       </div> \
                  </div>';


        $($btn).before($new_field);
         CKEDITOR.replaceAll( 'answer_' + $index );
    }

    $('.add-new-question-button').on('click', function () {

        $id = $('#max_id').val();

        addQuestionField(parseInt($id) + 1, this);

        $('#max_id').val(parseInt($id) + 1);
    });


})(jQuery);
