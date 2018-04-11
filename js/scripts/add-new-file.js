(function ($) {
    function addFileField($j, $btn, $cid) {
        $new_field = '<div class="doc-item box-mid-margin doc-item-' + $j + '"> \
              <label for="name_' + $j + '">Name:</label> \
             <input type="text" id="name_' + $j + '" \
                    name="doc[' + $j + '][name]"  class="full-textarea"> \
              <label for="file_' + $j + '">File:</label> \
             <input type="file" id="file_' + $j + '" \
                    name="doc[' + $j + ']" class="full-textarea"> \
              <input type="hidden" name="doc[' + $j + '][cid]" value="' + $cid + '">  \
              </div>';

            $($btn).before($new_field);


    }

    $('.add-new-document').on('click', function () {
        $id = $('#max_id').val();

        $catId = $(this).attr('class');

        $split = $catId.split(' ');
        $lastClass = $split[$split.length - 1];

        $splitClass = $lastClass.split('-');
        $cid = $splitClass[$splitClass.length - 1];

        addFileField(parseInt($id) + 1, this, $cid);

        $('#max_id').val(parseInt($id) + 1);
    });


})(jQuery);
