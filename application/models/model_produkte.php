<?php

class Model_Unsere_produkte extends Model {
  public function get_data() {
    include 'application/connection.php';
    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $last = end($routes);


    if (!empty($routes[2])) {
      $row = mysqli_fetch_assoc(
        $mysqli->query(
          "SELECT id FROM categories WHERE name LIKE '%" . $last . "%'"
        )
      );
      $id = $row['id'];
    }
    else {
      $id = 0;
    }

    $res = [];

    $query = $mysqli->query(
      "SELECT name, image, title, short_description, ord FROM products  WHERE parent_id=" . $id .
      " UNION SELECT name, image, title, short_description, ord FROM  categories  WHERE parent_id=" . $id .
      " UNION SELECT name, image, title, short_description, ord FROM thermostat  WHERE parent_id=" . $id .
      " ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items'][] = $r;
      }
    }

    if ($last !== 'produkte') {
      include 'application/menu.php';
      $menu = menu();

      $res['menu'] = $menu;
      $res['type'] = 'prod';
    }

    return $res;
  }
}
