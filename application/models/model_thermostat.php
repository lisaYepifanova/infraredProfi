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

        $coloursq = "SELECT * FROM thermostats_colours  WHERE thermostat_id=".$res[0]['id'];
        $query = $mysqli->query($coloursq);

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $c = "SELECT * FROM colours  WHERE id=".$r['colour_id'];
                $q = $mysqli->query($c);
                $res['colours'][] = mysqli_fetch_assoc($q);
            }
        }

        include 'application/menu.php';
        $menu = menu();

        $res['menu'] = $menu;



        $query = $mysqli->query(
          "SELECT * FROM product_document WHERE thermostat_id=".$res[0]['id']
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $query_doc = $mysqli->query(
                  "SELECT * FROM documents WHERE id=".$r['id']
                );

                if ($query_doc) {
                    while ($rd = mysqli_fetch_assoc($query_doc)) {
                        $res['doc'][] = $rd;
                    }
                }
            }
        }
        return $res;
    }
}
