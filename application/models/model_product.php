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


        //selecting indexes of documents
        $query = $mysqli->query(
          "SELECT * FROM product_document WHERE product_id=".$res[0]['id']
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

        $q = 'SELECT * FROM product_features WHERE product_id="'.$res[0]['id'].'"';

        $query = $mysqli->query($q);
        if ($query) {
            while ($s = mysqli_fetch_assoc($query)) {
                $res['features'][] = $s;
            }
        }


         $query = $mysqli->query(
              "SELECT * FROM product_thermostat"
            );

            if ($query) {
                while ($row = mysqli_fetch_assoc($query)) {
                    if ($row['id'] !== '2' or ($row['id'] == '2' and $res[0]['has_thermostat'] == '1')) {
                        $res['thermostats_info'][] = $row;
                    }
                }
            }

            $query = $mysqli->query(
              "SELECT * FROM product_principle WHERE product_id=".$res[0]['id']
            );

            if ($query) {
                while ($row = mysqli_fetch_assoc($query)) {
                        $res['principles'][] = $row;

                }
            }

            $query = $mysqli->query(
              "SELECT * FROM garantie"
            );

            if ($query) {
                while ($row = mysqli_fetch_assoc($query)) {
                        $res['garantie'] = $row;

                }
            }

        return $res;
    }
}