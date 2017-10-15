<?php

class Controller_order extends Controller
{

    function __construct()
    {
        $this->model = new Model_Order();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {

        $default = $this->default_model->get_data();

        if(!empty($_POST)) {
          $content_view = 'order_result_view.php';
          $data = $this->model->get_result_data();
        } else {
          $content_view = 'order_view.php';
          $data = $this->model->get_data();
        }

        $this->view->generate($content_view, 'template_view.php', $data, $default);
    }

}
