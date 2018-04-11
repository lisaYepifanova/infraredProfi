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

    $row = '';
    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $routes_count = count($routes);
    $path_lang = '1';

    foreach ($routes as $row) {
      if ($row !== '') {
        $qt_de = "SELECT * FROM page_alias  WHERE de='" . $row . "'";
        $qt_en = "SELECT * FROM page_alias  WHERE en='" . $row . "'";
        $query_de = $mysqli->query($qt_de);
        $query_en = $mysqli->query($qt_en);


        if ($query_de->num_rows == 1 and $query_en->num_rows == 1) {
          while ($r = mysqli_fetch_assoc($query_de)) {
            $res_al[] = $r;
            if (isset($_COOKIE['language']) && $path_lang == 1) {
              $path_lang = $_COOKIE['language'];
            }

          }
        }
        else {
          if ($query_de->num_rows !== 0) {
            while ($r = mysqli_fetch_assoc($query_de)) {
              $res_al[] = $r;
            }
          }
          else {
            if ($query_en->num_rows !== 0) {
              while ($r = mysqli_fetch_assoc($query_en)) {
                $res_al[] = $r;
                $path_lang = '2';

              }
            }
            else {

                $res_al = [];
                break;

            }
          }
        }
      }
    }

    setcookie("language", (int) $path_lang, time() + 3600 * 24 * 2, '/');

    if (isset($_COOKIE['language'])) {
      if ($path_lang !== $_COOKIE['language']) {
        header('Location:' . $_SERVER["REQUEST_URI"]);
      }
    }
    else {
      header('Location:' . $_SERVER["REQUEST_URI"]);
    }


    $bild = 'SELECT name FROM bildmotive_catalog WHERE lid="1"';

    $query = $mysqli->query($bild);

    $bild_name = mysqli_fetch_assoc($query);


    if (!empty($res_al[0])) {
      $controller_name = $res_al[0]['de'];
      $last = end($routes);

      if ($res_al[0]['de'] == 'produkte') {
        if (isset($res_al[1])) {
          if ($res_al[1]['de'] == $bild_name['name']) {
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
        if ($res_al[0]['de'] == 'product') {

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
          if ($res_al[0]['de'] == 'related-products' && $last == 'add') {
            $action_name = 'add';
            $controller_name = 'thermostat';
          }
          else {
            if ($res_al[0]['de'] == 'download' && $routes_count == 4) {
              if ($res_al[1]['de'] == 'delete') {
                $arg = $routes[3];
                $action_name = "delete";
              }
              else {
                if (!empty($res_al[1]['de'])) {
                  $action_name = $res_al[1]['de'];
                }
                if (!empty($res_al[2]['de'])) {
                  $arg = $res_al[2]['de'];
                }

              }
            }
            else {
              if (!empty($res_al[1]['de'])) {
                $action_name = $res_al[1]['de'];
              }
              if (!empty($res_al[2]['de'])) {
                $arg = $res_al[2]['de'];
              }

            }
          }
        }
      }
    } else if($routes_count == 1 && $routes[0] == '') {
      $action_name = 'index';
      $controller_name = 'main';
    } else {
       $controller_name = '404';
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
      if ($action == 'action_delete_slider_img' || $action == 'action_delete_gallery_img') {
        $arg = $last;
        $controller->$action($arg);
      }
      else {
        if ($arg == '' and $action !== 'action_edit_user') {
          $controller->$action();
        }
        else {
          $controller->$action($arg);
        }
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