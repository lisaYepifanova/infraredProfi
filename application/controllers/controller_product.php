<?php

class Controller_Product extends Controller {
  function __construct() {
    $this->model = new Model_Product();
    $this->view = new View();
    $this->default_model = new Model_Default();
  }

  function action_index() {
    $default = $this->default_model->get_data();
    $data = $this->model->get_data();
    $this->view->generate('product_view.php', 'template_view.php', $data, $default);
  }


  function action_add() {
    include 'application/auth.php';
    $default = $this->default_model->get_data();


    //$data = $this->model->add_data();

    if (isAuth()) {
      $save_data = NULL;
      if (!empty($_POST)) {

        $save_data = $this->model->save_data();
        $save_data_res = $save_data;

        if ($save_data_res) {
          $content_view = 'add_product_result_view.php';
        }
        else {
          $content_view = 'add_product_view.php';
        }
      }
      else {
        $content_view = 'add_product_view.php';
      }


      $data = $this->model->add_data();
      $data['save'] = $save_data;
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

  function action_delete() {
    include 'application/auth.php';
    $default = $this->default_model->get_data();

    if (isAuth()) {
      $content_view = 'delete_product_result_view.php';
      $data = $this->model->delete_data();
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

  function action_edit() {
    include 'application/auth.php';
    $default = $this->default_model->get_data();

    if (isAuth()) {
      $save_data = NULL;
      if (!empty($_POST)) {

        $save_data = $this->model->update_data();
        $save_data_res = $save_data;

        if ($save_data_res) {
          $data = '';
          $content_view = 'edit_product_result_view.php';
        }
        else {
          $data = $this->model->get_data();
          $content_view = 'edit_product_view.php';
        }
      }
      else {
        $data = $this->model->get_data();
        $content_view = 'edit_product_view.php';
      }



      $data['save'] = $save_data;
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