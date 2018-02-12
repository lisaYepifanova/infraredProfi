(function () {
    function isFurHandlerFilled() {
        if ($('#name').val()!=='' && $('#telephone').val()!=='' && $('#country').val() && $('#email').val()!=='' && $('#ihre_nachricht').val()!=='') {
            return true;
        } else {
            return false;
        }
    }

    $furHandlerButton = '.fur-handler-form button';

    if (isFurHandlerFilled()) {
       $($furHandlerButton).removeAttr('disabled');
    } else {
        $($furHandlerButton).attr('disabled', true);

    }

    $(  ".fur-handler-form .form-control").change(function () {
        if (isFurHandlerFilled()) {
            $($furHandlerButton).removeAttr('disabled');

        } else {
            $($furHandlerButton).attr('disabled', true);
        }
    });

}());
