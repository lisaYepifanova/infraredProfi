(function ($) {
    function addSSLinkField($index) {
        $new_field = '<div class="edition-site-settings-link-item box-small-mb"> \
        <input type="hidden" name="link['+$index+'][id]" value="'+$index+'" > \
          <label for="link-name-'+$index+'">Name: </label> \
          <input type="text" \
                 name="link['+$index+'][name]" \
                 id="link-name-'+$index+'>" > \
          <label for="link-path-'+$index+'">Link: </label> \
          <input type="text" \
                 name="link['+$index+'][path]" \
                 id="link-path-'+$index+'"> \
        </div>';


        $('.edition-site-settings-link-item').last().after($new_field);

    }

    $('.add-new-site-settings-link-button').on('click', function () {
        $lastId = $('.edition-site-settings-link-item input').last().attr('id');

        $split = $lastId.split('-');
        $index = $split[$split.length - 1];

        addSSLinkField(parseInt($index) + 1);
    });


})(jQuery);
