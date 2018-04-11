<?php

class Controller_aliases extends Controller {

  function __construct() {
    $this->model = new Model_Aliases();
    $this->view = new View();
    $this->default_model = new Model_Default();
  }

  function action_index() {
    if (isAuth()) {
      $data = $this->model->get_data();
      $default = $this->default_model->get_data();
      $this->view->generate('aliases_view.php', 'template_view.php', $data, $default);
    } else {
       $data = '';
      $content_view = '404_view.php';
    }

  }

  function action_edit() {
    include 'application/auth.php';
    $default = $this->default_model->get_data();

    if (isAuth()) {
      $update_data = NULL;
      if (!empty($_POST)) {

        $update_data = $this->model->update_data();
        $update_data_res = $update_data['res'];

        if ($update_data_res) {
          $content_view = 'edit_aliases_result_view.php';
        }
        else {
          $content_view = 'edit_aliases_view.php';
        }
      }
      else {
        $content_view = 'edit_aliases_view.php';
      }


      $data['add'] = $this->model->edit_data();
      $data['save'] = $update_data;
    }
    else {
      $data = '';
      $content_view = '404_view.php';
      header('Location: /login', TRUE, 303);
    }

    $this->view->generate(
      $content_view,
      'template_view.php',
      $data,
      $default
    );
  }
}
