<?php


class Controller_Login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        include 'application/auth.php';
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();

        if (isAuth()) {
            $_SESSION['is_auth'] = true;
            header('Location: /user', true, 303);
        } else {
            if ($this->model->check_data()) {
                header('Location: /user', true, 303);
            } else {
                $content_view = 'login_view.php';
            }
        }

        $this->view->generate(
          $content_view,
          'template_view.php',
          $data,
          $default
        );
    }
}

