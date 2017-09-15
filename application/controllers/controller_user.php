<?php

class Controller_User extends Controller
{

    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        include_once 'application/auth.php';

        if (isAuth()) {
            $data = $this->model->get_data();
            $content_view = 'user_view.php';
        } else {
            $data = '';
            $content_view = '404_view.php';
            header('Location: /login', true, 303);
        }

        $default = $this->default_model->get_data();
        $this->view->generate($content_view, 'template_view.php', $data, $default);
    }

}
