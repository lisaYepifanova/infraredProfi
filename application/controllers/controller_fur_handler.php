<?php
class Controller_Fur_handler extends Controller
{
    function __construct()
    {
        $this->model = new Model_Fur_handler();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();

        if (!empty($_POST)) {
            $send_data = $this->model->set_data();

            if ($send_data) {
                $content_view = 'send_info_view.php';
            } else {
                $content_view = 'fur_handler_view.php';
            }
        } else {
            $content_view = 'fur_handler_view.php';
        }

        $this->view->generate(
               $content_view,
              'template_view.php',
              $data,
              $default
            );


    }

    function action_send() {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        //$send_data = $this->model->set_data();

        $send_data = true;
        if ($send_data) {
            $content_view = 'send_info_view.php';
        } else {
            $content_view = 'fur_handler_view.php';
        }

        $this->view->generate(
              $content_view,
              'template_view.php',
              $data,
              $default
            );
    }

    function action_edit()
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
                    $content_view = 'edit_fur_handler_result_view.php';
                } else {
                    $content_view = 'edit_fur_handler_view.php';
                }
            } else {
                $content_view = 'edit_fur_handler_view.php';
            }


            $data['add'] = $this->model->get_data();
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
