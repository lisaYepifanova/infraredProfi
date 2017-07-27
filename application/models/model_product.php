<?php

class Model_Product extends Model
{
    public function get_data()
    {
        include 'application/connection.php';


        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $last = end($routes);

        $res = [];

        $q = "SELECT * FROM products  WHERE name='".$last."'";
        $query = $mysqli->query($q);

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res[] = $r;
            }
        }

        $img_q = "SELECT * FROM images  WHERE prod_id=".$res[0]['id'];
        $query = $mysqli->query($img_q);

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['gallery'][] = $r;
            }
        }


        $coloursq = "SELECT * FROM products_colours  WHERE product_id=".$res[0]['id'];
        $query = $mysqli->query($coloursq);

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $c = "SELECT * FROM colours  WHERE id=".$r['colour_id'];
                $q = $mysqli->query($c);
                $res['colours'][] = mysqli_fetch_assoc($q);
            }
        }

        $sizes_category = $res[0]['category_size_id'];
        $q = 'SELECT * FROM sizes WHERE category_size_id="'.$sizes_category.'"';

        $query = $mysqli->query($q);
        $sizes = [];
        if ($query) {
            while ($s = mysqli_fetch_assoc($query)) {
                $sizes[] = $s;
            }
        }

        include 'application/menu.php';
        $menu = menu();

        $res['menu'] = $menu;
        $res['sizes'] = $sizes;

        return $res;
    }
}