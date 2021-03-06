<?php

class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('main_view.php', 'template_view.php', $data, $default);
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
                    $content_view = 'edit_main_result_view.php';
                } else {
                    $content_view = 'edit_main_view.php';
                }
            } else {
                $content_view = 'edit_main_view.php';
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

    function action_delete_slider_img($id){
      include 'application/auth.php';
        $default = $this->default_model->get_data();

        if (isAuth())
        {
            $del_data = null;
            if (!empty($id))
            {

                $del_data = $this->model->delete_slider_img_data($id);
                $del_data_res = $del_data['res'];

                if ($del_data_res)
                {
                    $content_view = 'delete_slider_result_view.php';
                } else {
                    $content_view = 'edit_main_view.php';
                }
            } else {
                $content_view = 'edit_main_view.php';
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

    function action_delete_gallery_img($id){
      include 'application/auth.php';
        $default = $this->default_model->get_data();

        if (isAuth())
        {
            $del_data = null;
            if (!empty($id))
            {

                $del_data = $this->model->delete_gallery_img_data($id);
                $del_data_res = $del_data['res'];

                if ($del_data_res)
                {
                    $content_view = 'delete_gallery_result_view.php';
                } else {
                    $content_view = 'edit_main_view.php';
                }
            } else {
                $content_view = 'edit_main_view.php';
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

