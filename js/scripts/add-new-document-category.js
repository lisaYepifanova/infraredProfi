(function ($) {
    function addDocCatField($j, $btn) {
        $new_field = '<div class="faq-item panel panel-default doc-category doc-category-' + $j + '"> \
                    <h4 class="faq-item-title opened" data-parent="#accordion" data-toggle="collapse" \
                    data-target="#answer-' + $j + '" aria-expanded="true"> \
                     <span class="glyphicon glyphicon-chevron-down arrow-down"></span> \
                     <input type="text" class="full-textarea" name="category[' + $j + ']" value=""> \
                     <input type="hidden" name="category_old[' + $j + ']" value=""> \
                     </h4> \
                    <div role="definition" id="answer-'+$j+'" class="faq-item-answer panel-collapse collapse in" \
                    aria-expanded="true" style="">\
                    <a class="glyphicon glyphicon-plus add-new-document add-new-document-'+$j+'">Add new document</a> \
            </div></div>';

        $($btn).before($new_field);
    }

    $('.add-new-doc-cat').on('click', function () {
        $id = $('#max_cat_id').val();
        addDocCatField(parseInt($id) + 1, this);
        $('#max_cat_id').val(parseInt($id) + 1);
    });

})(jQuery);
