(function () {
    function sizeRect(i) {
        $('.row-' + i).on('click', function () {
            $('tr').removeClass('active-row');
            $('div').removeClass('active-rectangle');

            $('#row' + i + '.rectangle').addClass('active-rectangle');
            $('.row-' + i).addClass('active-row');
        });

        $('#row' + i).on('click', function () {
            $('tr').removeClass('active-row');
            $('div').removeClass('active-rectangle');
            $('.row-' + i).addClass('active-row');
            $('#row' + i + '.rectangle').addClass('active-rectangle');
        });
    }

    $row_num = $('.product-sizes tr').length;

    for (i = 1; i < $row_num; i++) {
        sizeRect(i);
    }


}());