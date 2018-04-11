(function ($) {
    function addProdSizesField($index) {
        $new_field = '<div class="row box-small-margin product-sizes-block prod-sizes-block-' + $index + '" \
                          id="prod-sizes-block-' + $index + '"> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][model]">Model name:</label> \
                          <input type="text" class="form-control prod-size-model" \
                                 id="prod_sizes_field[' + $index + '][model]" \
                                 name="prod_sizes_field[' + $index + '][model]"> \
                        </div> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][w]">Width (mm):</label> \
                          <input type="text" class="form-control prod-size-w" \
                                 id="prod_sizes_field[' + $index + '][w]" \
                                 name="prod_sizes_field[' + $index + '][w]"> \
                        </div> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][h]">Height (mm):</label> \
                          <input type="text" class="form-control prod-size-h" \
                                 id="prod_sizes_field[' + $index + '][h]" \
                                 name="prod_sizes_field[' + $index + '][h]"> \
                        </div> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][l]">Thickness (mm):</label> \
                          <input type="text" class="form-control prod-size-l" \
                                 id="prod_sizes_field[' + $index + '][l]" \
                                 name="prod_sizes_field[' + $index + '][l]"> \
                        </div> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
              <label for="prod_sizes_field[' + $index + '][left]">Left:</label> \
              <input type="number" class="form-control prod-size-left" \
                     id="prod_sizes_field[' + $index + '][left]" \
                     name="prod_sizes_field[' + $index + '][left]" \
                      value="0"> \
            </div> \
            <div class="col-xs-6 col-sm-3 box-small-margin"> \
              <label for="prod_sizes_field[' + $index + '][bottom]">Bottom:</label> \
              <input type="number" class="form-control prod-size-bottom" \
                     id="prod_sizes_field[' + $index + '][bottom]" \
                     name="prod_sizes_field[' + $index + '][bottom]" \
                      value="0"> \
            </div> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][raumgrosse]">Raumgrosse:</label> \
                          <input type="text" class="form-control prod-size-raumgrosse" \
                                 id="prod_sizes_field[' + $index + '][raumgrosse]" \
                                 name="prod_sizes_field[' + $index + '][raumgrosse]"> \
                        </div> \
                       <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][leistung]">Leistung:</label> \
                          <input type="text" class="form-control prod-size-leistung" \
                                 id="prod_sizes_field[' + $index + '][leistung]" \
                                 name="prod_sizes_field[' + $index + '][leistung]"> \
                        </div> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][gewicht]">Gewicht:</label> \
                          <input type="text" class="form-control prod-size-gewicht" \
                                 id="prod_sizes_field[' + $index + '][gewicht]" \
                                 name="prod_sizes_field[' + $index + '][gewicht]"> \
                        </div> \
                        <div class="col-xs-6 col-sm-3 box-small-margin"> \
                          <label for="prod_sizes_field[' + $index + '][einbauhohe]">Einbauhohe:</label>  \
                          <input type="text" class="form-control prod-size-einbauhohe" \
                                 id="prod_sizes_field['  + $index + '][einbauhohe]" \
                                 name="prod_sizes_field[' + $index + '][einbauhohe]"> \
                        </div>\
                                 </div>';


        $('.product-sizes-block').last().after($new_field);


        $new_rect = '<div class="rect-item rect-' + $index  + '">' + $index  + '</div>';
        $('.rect-item').last().after($new_rect);
    }



        ///
    // illustration
    $('.prod-sizes-block-1 .prod-size-w').on('change', function() {
       $('.rect-1').width($('.prod-sizes-block-1 .prod-size-w').val()/5 + 'px');
    });
    $('.prod-sizes-block-1 .prod-size-h').on('change', function() {
       $('.rect-1').height($('.prod-sizes-block-1 .prod-size-h').val()/5 + 'px');
    });

    $('.prod-sizes-block-1 .prod-size-left').on('change', function() {
       $('.rect-1').css('left', $('.prod-sizes-block-1 .prod-size-left').val()/5 + 'px');
    });

    $('.prod-sizes-block-1 .prod-size-bottom').on('change', function() {
       $('.rect-1').css('bottom', $('.prod-sizes-block-1 .prod-size-bottom').val()/5 + 'px');
    });





    $('.add-new-model-button').on('click', function () {
        $lastId = $('.product-sizes-block').last().attr('id');

        $split = $lastId.split('-');
        $index = $split[$split.length - 1];

        addProdSizesField(parseInt($index) + 1);

        $ind = parseInt($index) + 1;


        //illustration
        $('.prod-sizes-block-'+$ind+' .prod-size-w').on('change', function() {
       $('.rect-'+$ind).width($('.prod-sizes-block-'+$ind+' .prod-size-w').val()/5 + 'px');
    });
    $('.prod-sizes-block-'+$ind+' .prod-size-h').on('change', function() {
       $('.rect-'+$ind).height($('.prod-sizes-block-'+$ind+' .prod-size-h').val()/5 + 'px');
    });

    $('.prod-sizes-block-'+$ind+' .prod-size-left').on('change', function() {
       $('.rect-'+$ind).css('left', $('.prod-sizes-block-'+$ind+' .prod-size-left').val()/5 + 'px');
    });

    $('.prod-sizes-block-'+$ind+' .prod-size-bottom').on('change', function() {
       $('.rect-'+$ind).css('bottom', $('.prod-sizes-block-'+$ind+' .prod-size-bottom').val()/5 + 'px');
    });

    });


})(jQuery);
