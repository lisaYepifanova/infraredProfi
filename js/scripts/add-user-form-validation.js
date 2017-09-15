(function () {
    function disableSubmit(login, pass, pass_r) {
        if (login.length !== 0 && pass.length >= 8 && pass_r.length >= 8 && pass == pass_r) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
            console.log('attr added');

        }
    }

    function checkParams($elem) {
        var login = $('#login').val();
        var pass = $('#pass').val();
        var pass_r = $('#pass_r').val();

        if ($($elem).val().length !== 0 || (($elem == '#pass' || $elem == '#pass_r') && $($elem).val().length >= 8)) {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'none');
            $($elem).removeClass('red-field');
        } else {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'block');
            $($elem).addClass('red-field');
        }

        disableSubmit(login, pass, pass_r);

    }

    function errorField($elem) {
        if ($($elem).val().length === 0) {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'block');
            $($elem).addClass('red-field');
        } else {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'none');
            $($elem).removeClass('red-field');
        }
    }

    function checkLogin($elem) {
        var element = $elem.val();


        if (element.length !== 0) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
            console.log('attr added');

        }

        errorField($elem);
    }

    if ($('.handler-adding-form').length > 0) {
        disableSubmit($('.handler-adding-form #login').val(), $('.handler-adding-form #pass').val());

        $('.handler-adding-form #login').on('blur', function () {
            checkParams('.handler-adding-form #login');
        });

        $('.handler-adding-form #pass').on('blur', function () {
            checkParams('#pass');
        });

        $('.handler-adding-form #pass_r').on('blur', function () {
            checkParams('.handler-adding-form #pass_r');
        });
    }


    if ($('.handler-editing-form').length > 0) {
        $('.handler-editing-form #login').on('blur', function () {
            checkLogin('.handler-editing-form #login');
        });

        $('.handler-editing-form #pass_r').on('blur', function () {
            errorField('.handler-editing-form #pass_r');
        });

        $('.handler-editing-form #pass').on('blur', function () {
            errorField('.handler-editing-form #pass');
        });
    }


}());
