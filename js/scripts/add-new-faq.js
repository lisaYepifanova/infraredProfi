(function ($) {
    function addQuestionField($index) {
        $new_field = '<div class="faq-item panel box-mid-margin panel-default"> \
                    <h4 class="faq-item-title collapsed" \
                    data-parent="#accordion" \
                    data-toggle="collapse" \
                    data-target="#answer-' + $index + '" \
                    aria-expanded="false">\
                    <span class="glyphicon glyphicon-chevron-down arrow-down"> \
                     </span> \
                    <input type="text" placeholder="Question"\
                              name="question_' + $index + '" \
                              class="full-textarea"></h4> \
                    <div  role="definition" id="answer-' + $index + '" \
                    class="faq-item-answer panel-collapse collapse " \
                    aria-expanded="false" \
                    style="height: 0px;"><textarea\
                        class="editor-area full-textarea answer_' + $index + '" \
                        name="answer_' + $index + '" \
                       ></textarea> \
                       <input type="hidden" name="id_' +$index +'"  value="' + $index + '"> \
                        </div> \
                        <a class="glyphicon glyphicon-trash delete-faq-item">Delete</a> \
                       </div> \
                  </div>';


        $('.faq-item').last().after($new_field);
         CKEDITOR.replaceAll( 'answer_' + $index );
    }

    $('.add-new-question-button').on('click', function () {
        $lastId = $('.faq-item .faq-item-answer').last().attr('id');

        $split = $lastId.split('-');
        $index = $split[$split.length - 1];

        addQuestionField(parseInt($index) + 1);
    });


})(jQuery);
