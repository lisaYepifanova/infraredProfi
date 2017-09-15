<?php

class Controller_Logout extends Controller
{
    function __construct()
    {

    }

    function action_index()
    {
        include 'application/auth.php';

        if (isAuth()) {
            session_unset();
            session_destroy();
            unset($_SESSION);
        }

        header('Location: /login', true, 303);
    }
}
