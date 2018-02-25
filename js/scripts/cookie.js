(function () {

/*    function setCookie(name, value) {
        var date = new Date(new Date().getTime() + 7 * 24 * 60 * 60 * 1000);
        var updatedCookie = name + "=" + value + "; expires=" + date.toUTCString();

        document.cookie = updatedCookie;
        //location.reload();
    }*/

    function deleteCookie(name) {
        setCookie(name, "", {
            expires: -1
        })
    }

}());