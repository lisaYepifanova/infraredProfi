<?php

function menu()
{
    include 'application/connection.php';
    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $last = end($routes);

    $res = [];

    //add category items to the list
    $query = $mysqli->query(
      "SELECT id, name, title, parent_id FROM categories"
    );
    if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
            $r['iscategory'] = true;
            $res[] = $r;
        }
    }

    //add product items to the list
    $query = $mysqli->query("SELECT id name, title, parent_id FROM products");
    if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
            $r['iscategory'] = false;
            $res[] = $r;
        }
    }

    //products in current dir
    $current_query = $mysqli->query(
      "SELECT id, name, title, parent_id FROM products WHERE name='".$last."'"
    );
    $current = mysqli_fetch_assoc($current_query);
    $neighbour_query = $mysqli->query(
      "SELECT id, name, title, parent_id FROM products WHERE parent_id='".$current['parent_id']."'"
    );
    if ($neighbour_query) {
        while ($neighbour = mysqli_fetch_assoc($neighbour_query)) {
            $neighbour_set[] = $neighbour;
        }
    }

    $ind = $neighbour_set[0]['parent_id'];
    $category_set = '';
    while ($ind !== "0") {
        $current_category_query = $mysqli->query(
          "SELECT id, name, title, parent_id FROM categories WHERE id='".$ind."'"
        );
        $current_category = mysqli_fetch_assoc($current_category_query);

        $current_category['next'] = $category_set;
        $category_set = $current_category;

        $ind = $current_category['parent_id'];
    }


    //root items in menu
    $root_items = [];
    foreach ($res as $row) {
        if ($row['parent_id'] == 0) {
            $root_items[] = $row;
        }
    }

    $menu_res['neighbours'] = $neighbour_set;
    $menu_res['category'] = $category_set;
    $menu_res['root'] = $root_items;

    return $menu_res;
}

