<?php

class Model_Thermostat extends Model
{
    public function get_data()
    {
        include 'application/connection.php';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $last = end($routes);

        $res = [];

        $q = "SELECT * FROM thermostat WHERE name='".$last."'";
        $query = $mysqli->query($q);

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res[] = $r;
            }
        }

        $img_q = "SELECT * FROM thermostats_images  WHERE prod_id=".$res[0]['id'];
        $query = $mysqli->query($img_q);

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['gallery'][] = $r;
            }
        }

        include 'application/menu.php';
        $menu = menu();

        $res['menu'] = $menu;
        return $res;
    }
}
