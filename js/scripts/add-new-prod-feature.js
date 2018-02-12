(function ($) {
    function addProdFeatureField($index) {
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

        $('.product-feature-block').last().after($new_field);
    }

    $('.add-new-feature-button').on('click', function () {
        $lastId = $('.product-feature-block').last().attr('id');
        $split = $lastId.split('-');
        $index = $split[$split.length - 1];
        addProdFeatureField(parseInt($index) + 1);
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
