<?php

function neighbourItems($current_query, $table) {
  include 'application/connection.php';
  $current = mysqli_fetch_assoc($current_query);
  $neighbour_query = $mysqli->query(
    "SELECT id, name, title, parent_id FROM " . $table . " WHERE parent_id='" . $current['parent_id'] . "' ORDER BY ord"
  );
  $neighbour_set = [];
  if ($neighbour_query) {
    while ($neighbour = mysqli_fetch_assoc($neighbour_query)) {
      $neighbour_set[] = $neighbour;
    }
  }

  return $neighbour_set;
}

function menu() {
  include 'application/connection.php';
  $routes = explode('/', $_SERVER['REQUEST_URI']);
  $last = end($routes);
  $routes_count = count($routes);

  if ($last == 'edit') {
    $curr = $routes[$routes_count - 2];
  }
  else {
    $curr = $last;
  }
  $res = [];

  $last = $curr;

  //add product items to the list
  $query = $mysqli->query(
    "SELECT id, name, title, parent_id, ord FROM products ORDER BY ord"
  );
  if ($query) {
    while ($r = mysqli_fetch_assoc($query)) {
      $r['iscategory'] = FALSE;
      $res[] = $r;
    }
  }

  //add product items to the list
  $query = $mysqli->query(
    "SELECT id, name, title, parent_id, ord FROM thermostat ORDER BY ord"
  );
  if ($query) {
    while ($r = mysqli_fetch_assoc($query)) {
      $r['iscategory'] = FALSE;
      $res[] = $r;
    }
  }

  //add category items to the list
  $query = $mysqli->query(
    "SELECT id, name, title, parent_id, ord FROM categories ORDER BY ord"
  );

  if ($query) {
    while ($r = mysqli_fetch_assoc($query)) {
      $r['iscategory'] = TRUE;
      $res[] = $r;
    }
  }

  //add bildmotive catalog items to the list
  $query = $mysqli->query(
    "SELECT id, name, title, parent_id, ord FROM bildmotive_catalog ORDER BY ord"
  );

  if ($query) {
    while ($r = mysqli_fetch_assoc($query)) {
      $r['iscategory'] = TRUE;
      $res[] = $r;
    }
  }


  //products in current dir
  $current_query_prod = $mysqli->query(
    "SELECT id, name, title, parent_id FROM products WHERE name='" . $last . "' ORDER BY ord"
  );

  $current_query_therm = $mysqli->query(
    "SELECT id, name, title, parent_id FROM thermostat WHERE name='" . $last . "' ORDER BY ord"
  );

  $current_query_cat = $mysqli->query(
    "SELECT id, name, title, parent_id FROM categories WHERE name='" . $last . "' ORDER BY ord"
  );

  $current_query_bild = $mysqli->query(
    "SELECT id, name, title, parent_id FROM bildmotive_catalog WHERE name='" . $last . "' ORDER BY ord"
  );


  if ($current_query_prod->num_rows !== 0) {
    $neighbour_set = neighbourItems($current_query_prod, 'products');
  }
  else {
    if ($current_query_therm->num_rows !== 0) {
      $neighbour_set = neighbourItems($current_query_therm, 'thermostat');
    }
    else {
      if ($current_query_bild->num_rows !== 0) {
        $neighbour_set = neighbourItems($current_query_bild, 'bildmotive_catalog');
      }
      else {
        if ($current_query_cat->num_rows !== 0) {
          $neighbour_set = neighbourItems(
            $current_query_therm,
            'categories'
          );
        }
      }
    }
  }

  if (isset($neighbour_set)) {
    $ind = $neighbour_set[0]['parent_id'];
    $category_set = '';
    while ($ind !== "0") {
      $current_category_query = $mysqli->query(
        "SELECT id, name, title, parent_id FROM categories WHERE id='" . $ind . "' ORDER BY ord"
      );
      $current_category = mysqli_fetch_assoc($current_category_query);

      $current_category['next'] = $category_set;
      $category_set = $current_category;

      $ind = $current_category['parent_id'];
    }

    $menu_res['neighbours'] = $neighbour_set;
    $menu_res['category'] = $category_set;
  }

  //root items in menu
  $root_items = [];
  foreach ($res as $row) {
    if ($row['parent_id'] == 0) {
      $root_items[] = $row;
    }
  }

  $ord = [];
  foreach ($root_items as $key => $row) {
    $ord[$key] = $row['ord'];
  }

  array_multisort($ord, SORT_ASC, $root_items);


  $menu_res['root'] = $root_items;

  return $menu_res;
}


