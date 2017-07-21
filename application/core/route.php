<?php

class Route
{
    static function start()
    {
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        $model_name = 'model_'.$controller_name;
        $controller_name = 'controller_'.$controller_name;
        $action_name = 'action_'.$action_name;


        $model_file = strtolower(preg_replace("/-/","_", $model_name)).'.php';
        $model_path = "application/models/".$model_file;
        if (file_exists($model_path)) {
            include "application/models/".$model_file;
        }

        $controller_file = strtolower(preg_replace("/-/","_", $controller_name)).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if (file_exists($controller_path)) {
            include "application/controllers/".$controller_file;
        } else {
            $controller_name = 'controller_404';
            $controller_file = strtolower(preg_replace("/-/","_", $controller_name)).'.php';
            include "application/controllers/".$controller_file;
        }

        $controller_name_changed = preg_replace("/-/","_", $controller_name);
        $controller = new $controller_name_changed;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            //if($controller_name == 'controller_404') {
                $cont = 'controller_404';
                $controller = new $cont;
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