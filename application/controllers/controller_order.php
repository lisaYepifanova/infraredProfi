<?php

class Controller_order extends Controller {

  function __construct() {
    $this->model = new Model_Order();
    $this->view = new View();
    $this->default_model = new Model_Default();
  }

  function action_index() {
    include_once 'application/auth.php';

    $default = $this->default_model->get_data();

    if (isAuth()) {
      if (!empty($_POST)) {
        $content_view = 'order_result_view.php';
        $data = $this->model->get_result_data();
      }
      else {
        $content_view = 'order_view.php';
        $data = $this->model->get_data();
      }

    }
    else {
      $data = '';
      $content_view = '404_view.php';
      header('Location: /login', TRUE, 303);
    }


    $this->view->generate($content_view, 'template_view.php', $data, $default);
  }

}
