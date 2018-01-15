(function () {

    function checkPass(pass, passr) {
        if ($(pass).val().length >= 8) {
            $('#pass + .green-tick-icon').css('display', 'block');
        } else {
            $('#pass + .green-tick-icon').css('display', 'none');
        }

        if (($(pass).val() !== '' && $(passr).val() !== '') && $(pass).val() == $(passr).val()) {
            $('#pass_r + .green-tick-icon').css('display', 'block');
        } else {
            $('#pass_r + .green-tick-icon').css('display', 'none');
        }

    }

    if ($('#pass').length > 0) {
        $('#pass').on('blur', function () {
            checkPass($('#pass'), $('#pass_r'))
        });
    }


    if ($('#pass_r').length > 0) {
        $('#pass_r').on('blur', function () {
            checkPass($('#pass'), $('#pass_r'))
        });
    }


}());
