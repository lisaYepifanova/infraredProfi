<?php
define('IMAGEPATH', View::partPath().'../img/');
define('CSSPATH', View::partPath().'../css/');
define('JSPATH', View::partPath().'../js/');
define('ROOTPATH', View::partPath().'../');

class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate(
      $content_view,
      $template_view,
      $data = null,
      $default = null
    ) {
        /*
        if(is_array($data)) {
            extract($data);
        }
        */

        include 'application/views/'.$template_view;
    }

    function partPath()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $img_part_path = "";
        if (count($routes) - 2 > 0) {
            for ($i = 1; $i <= count($routes) - 2; $i++) {
                $img_part_path = $img_part_path."../";
            }
        }

        return $img_part_path;
    }

}
