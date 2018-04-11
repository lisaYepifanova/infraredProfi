<?php

class Controller_Order_Sending extends Controller {
  function __construct() {
    $this->model = new Model_Order_Sending();
    $this->view = new View();
    $this->default_model = new Model_Default();
  }

  function action_index() {
    include_once 'application/auth.php';

    if (isAuth()) {
      $data = $this->model->send_data();
      $content_view = 'order_sending_view.php';

    }
    else {
      $data = '';
      $content_view = '404_view.php';
      header('Location: /login', TRUE, 303);
    }

    $default = $this->default_model->get_data();

    $this->view->generate($content_view, 'template_view.php', $data, $default);
  }
}