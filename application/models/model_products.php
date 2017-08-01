<?php

class Model_Products extends Model
{
    public function get_data()
    {
        include 'application/connection.php';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $last = end($routes);

        if (!empty($routes[2])) {
            $row = mysqli_fetch_assoc(
              $mysqli->query(
                "SELECT id FROM categories WHERE name LIKE '%".$last."%'"
              )
            );
            $id = $row['id'];
        } else {
            $id = 0;
        }

        $res = array();

        $query = $mysqli->query(
          "SELECT name, image, title, short_description FROM categories  WHERE parent_id=".$id
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res[] = $r;
            }
        }

        $query = $mysqli->query(
          "SELECT name, image, title, short_description FROM products  WHERE parent_id=".$id
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res[] = $r;
            }
        }

        $query = $mysqli->query(
          "SELECT name, image, title, short_description FROM thermostat  WHERE parent_id=".$id
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res[] = $r;
            }
        }

        return $res;
    }
}
