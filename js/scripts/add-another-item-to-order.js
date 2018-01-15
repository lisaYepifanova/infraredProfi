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
            $elemId = $elemId.substring(0, $elemId.length - 3);
            $elem.find('.count').attr('id', $elemId + '[' + $numOfCurrElem + ']');

            $elemClass = $elem.find('.count').attr('class');
            $elemClass = $elemClass.substring(0, $elemClass.length - 3);
            $elem.find('.count').attr('class', $elemClass + '[' + $numOfCurrElem + ']');

            $elemName = $elem.find('.count').attr('name');
            $elemName = $elemName.substring(0, $elemName.length - 3);
            $elem.find('.count').attr('name', $elemName + '[' + $numOfCurrElem + ']');



            $tId = $elem.find('.has-thermostat').attr('id');
            $tId = $tId.substring(0, $tId.length - 3);
            $elem.find('.has-thermostat').attr('id', $tId + '[' + $numOfCurrElem + ']');

            $tName = $elem.find('.has-thermostat').attr('name');
            $tName = $tName.substring(0, $tName.length - 3);
            $elem.find('.has-thermostat').attr('name', $tName + '[' + $numOfCurrElem + ']');




            $elem.insertAfter($(this).parent().parent());
           // orderCount();

        });

}, 100);

})(jQuery);