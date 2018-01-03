<?php

class Route
{
    static function start()
    {
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

        if (!empty($routes[1])) {
            $controller_name = $routes[1];

            if ($routes[1] == 'produkte') {
                $last = end($routes);

                $result_category = $mysqli->query(
                  "SELECT * FROM categories WHERE name LIKE '%".$last."%'"
                );

                $result_product = $mysqli->query(
                  "SELECT * FROM products WHERE name LIKE '%".$last."%'"
                );

                $result_thermostat = $mysqli->query(
                  "SELECT * FROM thermostat WHERE name LIKE '%".$last."%'"
                );

                $action_name = 'index';
                if ($result_category->num_rows !== 0 || empty($routes[2])) {
                    $controller_name = 'produkte';
                } else {
                    if ($result_product->num_rows !== 0) {
                        $controller_name = 'product';
                    } else {
                        if ($result_thermostat->num_rows !== 0) {
                            $controller_name = 'thermostat';
                        } else {
                            $controller_name = '404';
                        }
                    }
                }


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

        $action_name = strtolower(
            preg_replace("/-/", "_", $action_name)
          );

        $model_name = 'model_'.$controller_name;
        $controller_name = 'controller_'.$controller_name;
        $action_name = 'action_'.$action_name;



        $model_file = strtolower(preg_replace("/-/", "_", $model_name)).'.php';
        $model_path = "application/models/".$model_file;
        if (file_exists($model_path)) {
            include "application/models/".$model_file;
        }

        $controller_file = strtolower(
            preg_replace("/-/", "_", $controller_name)
          ).'.php';
        $controller_path = "application/controllers/".$controller_file;

        if (file_exists($controller_path)) {
            include "application/controllers/".$controller_file;
        } else {
            $controller_name = 'controller_404';
            $controller_file = strtolower(
                preg_replace("/-/", "_", $controller_name)
              ).'.php';
            include "application/controllers/".$controller_file;
        }

        $controller_name_changed = preg_replace("/-/", "_", $controller_name);
        $controller = new $controller_name_changed;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            if($arg == '' and $action !== 'action_edit_user') {
                $controller->$action();
            } else {
                $controller->$action($arg);
            }

        } else {
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

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host.'404');
        die();

    }
}