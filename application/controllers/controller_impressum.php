<?php

class Controller_impressum extends Controller
{

    function __construct()
    {
      $this->model = new Model_Impressum();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $default = $this->default_model->get_data();
        $this->view->generate('impressum_view.php', 'template_view.php', $data, $default);
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
                    $content_view = 'edit_impressum_result_view.php';
                } else {
                    $content_view = 'edit_impressum_view.php';
                }
            } else {
                $content_view = 'edit_impressum_view.php';
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
