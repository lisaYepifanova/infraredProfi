(function ($) {
    function addProdFeatureField($index, $btn) {
        $new_field = '<div class="row box-small-margin product-feature-block prod-feature-block-' + $index + '" id="prod-feature-block-' + $index + '"> \
             <div class="col-sm-6"><label for="prod_feature_field[' + $index + '][name]">Name:</label> \
            <input type="text" class="form-control prod-feature-name" \
                   id="prod_feature_field[' + $index + '][name]" \
                   name="prod_feature[' + $index + '][name]"> \
            </div><div class="col-sm-6"><label for="prod_feature_field[' + $index + '][value]">Value:</label> \
            <input type="text" class="form-control prod-feature-value" \
                   id="prod_feature_field[' + $index + '][value]" \
                   name="prod_feature[' + $index + '][value]"> \
            </div></div>';

        $($btn).before($new_field);
    }

    $('.add-new-feature-button').on('click', function () {
        $id = $('#max_feature_id').val();
        addProdFeatureField(parseInt($id) + 1, this);
        $('#max_feature_id').val(parseInt($id) + 1);
    });

    if ($('#has-prod-feature').prop('checked')) {
        $('.edit-therm-features').css('display', 'block');
    } else {
        $('.edit-therm-features').css('display', 'none');
    }

    $('#has-prod-feature').on('click', function () {
        if ($('#has-prod-feature').prop('checked')) {
            $('.edit-therm-features').css('display', 'block');
        } else {
            $('.edit-therm-features').css('display', 'none');
        }
    });

})(jQuery);
