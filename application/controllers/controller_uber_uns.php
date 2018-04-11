<?php
class Controller_Uber_uns extends Controller
{
    function __construct()
    {
        $this->model = new Model_Uber_uns();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('uber_uns_view.php', 'template_view.php', $data, $default);
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
                    $content_view = 'edit_uber_uns_result_view.php';
                } else {
                    $content_view = 'edit_uber_uns_view.php';
                }
            } else {
                $content_view = 'edit_uber_uns_view.php';
            }


            $data['add'] = $this->model->edit_data();
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