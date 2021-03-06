<?php
class Controller_Download extends Controller
{
    function __construct()
    {
        $this->model = new Model_Download();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('download_view.php', 'template_view.php', $data, $default);
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
                    $content_view = 'edit_download_result_view.php';
                } else {
                    $content_view = 'edit_download_view.php';
                }
            } else {
                $content_view = 'edit_download_view.php';
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

    function action_delete($id){
      include 'application/auth.php';
        $default = $this->default_model->get_data();

        if (isAuth())
        {
            $del_data = null;
            if (!empty($id))
            {

                $del_data = $this->model->delete_data($id);
                $del_data_res = $del_data['res'];

                if ($del_data_res)
                {
                    $content_view = 'delete_download_result_view.php';
                } else {
                    $content_view = 'edit_download_view.php';
                }
            } else {
                $content_view = 'edit_download_view.php';
            }


            $data['add'] = $this->model->get_data();
            $data['save'] = $del_data;
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