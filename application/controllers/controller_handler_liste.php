<?php

class Controller_Handler_liste extends Controller
{
    function __construct()
    {
        $this->model = new Model_Handler_liste();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        include 'application/auth.php';
        $default = $this->default_model->get_data();

        if (isAuth()) {
            $data = $this->model->get_data();
            $content_view = 'handler_liste_view.php';
        } else {
            $data = '';
            $content_view = '404_view.php';
            header('Location: /login', true, 303);
        }

        $this->view->generate(
          $content_view,
          'template_view.php',
          $data,
          $default
        );
    }

    function action_add_user()
    {
        include 'application/auth.php';

        $default = $this->default_model->get_data();

        if (isAuth()) {
            $send_data = null;
            if (!empty($_POST)) {

                $send_data = $this->model->save_data();
                $send_data_res = $send_data['res'];

                if ($send_data_res) {
                    $content_view = 'add_handler_result_view.php';
                } else {
                    $content_view = 'add_handler_view.php';
                }
            } else {
                $content_view = 'add_handler_view.php';
            }


            $data['add'] = $this->model->add_handler();
            $data['save'] = $send_data;
        } else {
            $data = '';
            header('Location: /login', true, 303);
        }

        $this->view->generate(
          $content_view,
          'template_view.php',
          $data,
          $default
        );
    }

    function action_delete_user()
    {
        include 'application/auth.php';

        $default = $this->default_model->get_data();

        if (isAuth()) {
            $data = $this->model->del_data();
            $content_view = 'del_user_view.php';
        } else {
            $data = '';
            $content_view = '404_view.php';
            header('Location: /login', true, 303);
        }

        $this->view->generate(
          $content_view,
          'template_view.php',
          $data,
          $default
        );
    }

    function action_edit_user($arg)
    {
        include 'application/auth.php';
        $default = $this->default_model->get_data();

        if (isAuth())
        {
            $update_data = null;
            if (!empty($_POST))
            {

                $update_data = $this->model->update_data();
                $update_data_res = $update_data['res'];

                if ($update_data_res)
                {
                    $content_view = 'edit_user_result_view.php';
                } else {
                    $content_view = 'edit_user_view.php';
                }
            } else {
                $content_view = 'edit_user_view.php';
            }

            $data['add'] = $this->model->edit_data($arg);
            $data['save'] = $update_data;
        } else {
            $data = '';
            $content_view = '404_view.php';
            header('Location: /login', true, 303);
        }

        $this->view->generate(
          $content_view,
          'template_view.php',
          $data,
          $default
        );
    }
}
