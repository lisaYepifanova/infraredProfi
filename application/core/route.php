<?php

class Route {
  static function start() {

    require_once 'application/language.php';

 include 'application/connection.php';
    $controller_name = 'Main';
    $action_name = 'index';
    $arg = '';

    if (substr(
        $_SERVER['REQUEST_URI'],
        strlen($_SERVER['REQUEST_URI']) - 1
      ) == "/"
    ) {
      $_SERVER['REQUEST_URI'] = substr(
        $_SERVER['REQUEST_URI'],
        0,
        strlen($_SERVER['REQUEST_URI']) - 1
      );
    }

    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $routes_count = count($routes);

    if (!empty($routes[1])) {
      $controller_name = $routes[1];
      $last = end($routes);

      if ($routes[1] == 'produkte') {
        if (isset($routes[2])) {
          if ($routes[2] == 'bildmotive') {
            if ($routes_count == '3') {
              $action_name = 'index';
              $controller_name = 'bildmotive_catalog';
            }
            else {
              if ($routes_count == '4') {
                if ($last == 'edit') {
                  $action_name = 'edit';
                  $controller_name = 'bildmotive_catalog';
                }
                else {
                  if ($last == 'add') {
                    $action_name = 'add';
                    $controller_name = 'bildmotive';
                  }
                  else {
                    $action_name = 'index';
                    $controller_name = 'bildmotive';
                  }
                }
              }
              else {
                if ($routes_count == '5') {
                  if ($last == 'edit') {
                    $action_name = 'edit';
                    $controller_name = 'bildmotive';
                  }
                  else {
                    if ($last == 'delete') {
                      $action_name = 'delete';
                      $controller_name = 'bildmotive';
                    }
                  }
                }
              }
            }

          }
          else {
            if ($last == 'add') {
              $action_name = 'add';
              $controller_name = 'produkte';
            }
            else {
              if ($last == 'delete') {
                $action_name = 'delete';
                $controller_name = 'produkte';
              }
              else {

                if ($last !== 'edit') {
                  $lp = $last;
                }
                else {
                  $lp = $routes[$routes_count - 2];
                }

                $result_category = $mysqli->query(
                  "SELECT * FROM categories WHERE name LIKE '%" . $lp . "%'"
                );

                $result_product = $mysqli->query(
                  "SELECT * FROM products WHERE name LIKE '%" . $lp . "%'"
                );

                $result_thermostat = $mysqli->query(
                  "SELECT * FROM thermostat WHERE name LIKE '%" . $lp . "%'"
                );

                $action_name = 'index';
                if ($last == 'edit') {
                  $action_name = 'edit';
                }

                if ($result_category->num_rows !== 0 || empty($routes[2])) {
                  $controller_name = 'produkte';


                }
                else {
                  if ($result_product->num_rows !== 0) {
                    $controller_name = 'product';
                  }
                  else {
                    if ($result_thermostat->num_rows !== 0) {
                      $controller_name = 'thermostat';
                    }
                    else {
                      $controller_name = '404';
                    }
                  }
                }


              }
            }
          }
        }
      }
      else {
        if ($routes[1] == 'product') {

          if ($last == 'add') {
            $action_name = 'add';
            $controller_name = 'product';
          }
          else {
            if ($last == 'delete') {
              $action_name = 'delete';
              $controller_name = 'product';
            }
          }

        }
        else {
          if ($routes[1] == 'related-products' && $last == 'add') {
            $action_name = 'add';
            $controller_name = 'thermostat';
          }
          else {
            if (!empty($routes[2])) {
              $action_name = $routes[2];
            }
            if (!empty($routes[3])) {
              $arg = $routes[3];
            }

          }
        }
      }
    }

    $action_name = strtolower(
      preg_replace("/-/", "_", $action_name)
    );

    $model_name = 'model_' . $controller_name;
    $controller_name = 'controller_' . $controller_name;
    $action_name = 'action_' . $action_name;


    $model_file = strtolower(preg_replace("/-/", "_", $model_name)) . '.php';
    $model_path = "application/models/" . $model_file;
    if (file_exists($model_path)) {
      include "application/models/" . $model_file;
    }

    $controller_file = strtolower(
        preg_replace("/-/", "_", $controller_name)
      ) . '.php';
    $controller_path = "application/controllers/" . $controller_file;

    if (file_exists($controller_path)) {
      include "application/controllers/" . $controller_file;
    }
    else {
      $controller_name = 'controller_404';
      $controller_file = strtolower(
          preg_replace("/-/", "_", $controller_name)
        ) . '.php';
      include "application/controllers/" . $controller_file;
    }

    $controller_name_changed = preg_replace("/-/", "_", $controller_name);
    $controller = new $controller_name_changed;
    $action = $action_name;

    if (method_exists($controller, $action)) {
      if ($arg == '' and $action !== 'action_edit_user') {
        $controller->$action();
      }
      else {
        $controller->$action($arg);
      }

    }
    else {
      //if($controller_name == 'controller_404') {
      $controller_name = 'controller_404';
      include "application/controllers/controller_404.php";
      $controller_name_changed = preg_replace(
        "/-/",
        "_",
        $controller_name
      );
      $controller = new $controller_name_changed;
      $action = 'action_index';
      $controller->$action();
      //}

    }


  }

  function ErrorPage404() {
    $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('Location:' . $host . '404');
    die();

  }
}