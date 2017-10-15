(function($) {
setTimeout(function () {

        $('tr').find('td .add-another-button').on('click', function () {
            $elem = $(this).parent().parent().clone();
            $elem.find('.add-another-button').remove();
            $currid = $elem.find('.count').attr('id');

            console.log($currid);

            $currclass = $elem.find('.count').attr('class').split(' ')[1];

            $parentClass = $(this).parent().parent().parent().attr('class');

            $numOfCurrElem = $('.'+$currclass).length;

            $elemId = $elem.find('.count').attr('id');
            $elem.find('.count').attr('id', $elemId + '_' + $numOfCurrElem);

            $elemName = $elem.find('.count').attr('name');
            $elem.find('.count').attr('name', $elemName + '_' + $numOfCurrElem);


            $tId = $elem.find('.has-thermostat').attr('id');
            $elem.find('.has-thermostat').attr('id', $tId + '_' + $numOfCurrElem);

            $tName = $elem.find('.has-thermostat').attr('name');
            $elem.find('.has-thermostat').attr('name', $tName + '_' + $numOfCurrElem);




            $elem.insertAfter($(this).parent().parent());
            orderCount();

        });

}, 100);

})(jQuery);