<?php

class Model_Unsere_produkte extends Model {
  public function get_data() {
    include 'application/connection.php';
    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $last = end($routes);

    $routes_count = count($routes);
    if ($last == "edit") {
      $last = $routes[$routes_count - 2];
    }

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

    $query = $mysqli->query("SELECT * FROM   categories  WHERE name='" . $last . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    $query = $mysqli->query(
      "SELECT name, image, title, short_description, ord FROM products  WHERE parent_id=" . $id .
      " UNION SELECT name, image, title, short_description, ord FROM  categories  WHERE parent_id=" . $id .
      " UNION SELECT name, image, title, short_description, ord FROM thermostat  WHERE parent_id=" . $id .
      " UNION SELECT name, image, title, short_description, ord FROM bildmotive_catalog  WHERE parent_id=" . $id .
      " ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items_show'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM categories ");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    $query = $mysqli->query(
      "SELECT id, title, ord, parent_id FROM products  " .
      " UNION SELECT id, title, ord, parent_id FROM  categories " .
      " UNION SELECT id, title, ord, parent_id FROM thermostat  " .
      " UNION SELECT id, title, ord, parent_id FROM bildmotive_catalog  " .
      " ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items'][] = $r;
      }
    }

    if ($last !== 'produkte') {
      include_once 'application/menu.php';
      $menu = menu();

      $res['menu'] = $menu;
      $res['type'] = 'prod';
    }

    return $res;
  }

  public function add_data() {
    include 'application/connection.php';

    $res = [];

    $query = $mysqli->query("SELECT * FROM categories ");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;


    $query = $mysqli->query(
      "SELECT id, title, ord, parent_id FROM products " .
      " UNION SELECT id, title, ord, parent_id FROM  categories  " .
      " UNION SELECT id, title, ord, parent_id FROM thermostat " .
      " ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items'][] = $r;
      }
    }

    return $res;
  }

  public function save_data() {
    include 'application/connection.php';


    $id = NULL;
    if (isset($_POST['id'])) {
      $id = $_POST['id'];

      $add_mi = 'INSERT INTO categories (ord) VALUES ("' . $id . '")';
      $adding_miq = $mysqli->query($add_mi);


      $name = NULL;
      if (isset($_POST['name'])) {
        $title = strtoupper($_POST['name']);

        $add_mi = 'UPDATE categories SET title = "' . $title . '" WHERE ord=' . $id;
        $adding_miq = $mysqli->query($add_mi);


        //берем имя папки чтобы переименовать
        $query = "SELECT name FROM categories  WHERE id='" . $id . "'";
        $n_img = $mysqli->query($query);

        if ($n_img) {
          while ($r = mysqli_fetch_assoc($n_img)) {
            $pn = $r;
          }
        }

        $old_name = $pn['name'];

        rename(IMAGEPATH . 'products/' . $old_name, IMAGEPATH . 'products/' . $name);


        $name = str_replace(' ', '-', mb_strtolower($_POST['name']));
        $add_mi = 'UPDATE categories SET name = "' . $name . '" WHERE ord=' . $id;
        $adding_miq = $mysqli->query($add_mi);

      }


      $parent_id = NULL;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE categories SET parent_id = "' . $parent_id . '" WHERE ord=' . $id;
        $adding_miq = $mysqli->query($add_mi);
      }


      ///////////////

      $img_q = "SELECT id FROM categories  WHERE name='" . $name . "'";
      $query = $mysqli->query($img_q);

      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $cid = $r;
        }
      }

      $cid = $cid['id'];


      $query = $mysqli->query(
        "SELECT id, name, ord FROM products  WHERE parent_id='" . $parent_id .
        "' UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $parent_id .
        "' UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $parent_id .
        "' ORDER BY ord"
      );

      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $tmp['id'][] = $r['id'];
          $tmp['ord'][] = $r['ord'];
          $tmp['name'][] = $r['name'];
          $item[] = $r;

        }
      }

      $tmp['id'][] = $cid;
      $tmp['ord'][] = $id;
      $tmp['name'][] = $name;

      $ll['id'] = $cid;
      $ll['ord'] = $id;
      $ll['name'] = $name;
      $item[] = $ll;

      array_multisort($tmp['ord'], SORT_ASC, $item);

      $fin_ind = 10;
      foreach ($item as $it) {
        $q_p = "SELECT id FROM products  WHERE name='" . $it['name'] . "'";
        $q_c = "SELECT id FROM categories  WHERE name='" . $it['name'] . "'";
        $q_t = "SELECT id FROM thermostat  WHERE name='" . $it['name'] . "'";

        $qq_p = $mysqli->query($q_p);
        $qq_c = $mysqli->query($q_c);
        $qq_t = $mysqli->query($q_t);

        if ($qq_p->num_rows !== 0) {
          $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
          $adding_mi = $mysqli->query($add_mi);
        }
        else {
          if ($qq_c->num_rows !== 0) {
            $add_mi = 'UPDATE categories SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
            $adding_mi = $mysqli->query($add_mi);
          }
          else {
            if ($qq_t->num_rows !== 0) {
              $add_mi = 'UPDATE thermostat SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
              $adding_mi = $mysqli->query($add_mi);
            }
            else {
              $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
              $adding_mi = $mysqli->query($add_mi);
            }
          }
        }
        $fin_ind += 10;

      }

      ////////////////
      //загрузка подписи
      if (isset($_FILES)) {
        if ($_FILES['category_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0744);
          }
          $uploadfile = $uploaddir . basename($_FILES['category_image']['name']);
          if ($_FILES['category_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $category_image = NULL;
            if (isset($_FILES['category_image']['name'])) {
              $category_image = $_FILES['category_image']['name'];
            }

            $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $category_image . '" WHERE id=' . $cid;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }

        }
      }


    }
    $res = TRUE;

    return $res;
  }

  public function delete_data() {
    include 'application/connection.php';

    if (substr(
        $_SERVER['REQUEST_URI'],
        strlen($_SERVER['REQUEST_URI']) - 1
      ) == "/"
    ) {
      $_SERVER['REQUEST_URI'] = substr(
        $_SERVER['REQUEST_URI'],
        0,
        strlen($_SERVER['REQUEST_URI']) - 1
      );
    }

    $routes = explode('/', $_SERVER['REQUEST_URI']);

    $route_len = count($routes);


    $curr_name = $routes[$route_len - 2];

    $q_p = "SELECT id FROM products  WHERE name='" . $curr_name . "'";
    $q_c = "SELECT id FROM categories  WHERE name='" . $curr_name . "'";
    $q_t = "SELECT id FROM thermostat  WHERE name='" . $curr_name . "'";

    $qq_p = $mysqli->query($q_p);
    $qq_c = $mysqli->query($q_c);
    $qq_t = $mysqli->query($q_t);


    if ($qq_p->num_rows !== 0) {

      if ($qq_p) {
        while ($r = mysqli_fetch_assoc($qq_p)) {
          $id = $r['id'];
        }
      }

      $query = "SELECT image FROM `products` WHERE name='" . $curr_name . "'";
      $adding_mi = $mysqli->query($query);

      if ($adding_mi) {
        while ($r = mysqli_fetch_assoc($adding_mi)) {
          $image = $r['image'];
        }
      }

      if ($r !== NULL) {
        $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['image'];
        unlink($img_path);
      }

      //Gallery images
      $query = "SELECT path FROM `images` WHERE prod_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);

      if ($adding_mi) {
        while ($r = mysqli_fetch_assoc($adding_mi)) {
          $image = $r['path'];
          $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['path'];
          unlink($img_path);
        }
      }
      rmdir($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $curr_name);

      $query = "DELETE FROM `product_features` WHERE product_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);

      $query = "DELETE FROM `product_principle` WHERE product_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);


      $query = "DELETE FROM `products_colours` WHERE product_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);


      $query = "DELETE FROM `sizes` WHERE category_size_id='" . $curr_name . "'";
      $adding_mi = $mysqli->query($query);


      $query = "DELETE FROM `images` WHERE prod_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);


      $query = "DELETE FROM `products` WHERE name='" . $curr_name . "'";
      $adding_mi = $mysqli->query($query);


    }
    else {
      if ($qq_c->num_rows !== 0) {
        if ($qq_c) {
          while ($r = mysqli_fetch_assoc($qq_c)) {
            $id = $r['id'];
          }
        }


        $query = "SELECT image FROM `categories` WHERE id='" . $id . "'";
        $adding_mi = $mysqli->query($query);

        if ($adding_mi) {
          while ($r = mysqli_fetch_assoc($adding_mi)) {
            $image = $r['image'];
            $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['image'];
            if ($r['image'] !== '') {
              unlink($img_path);
            }

          }
          rmdir($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $curr_name);
        }


        $query = "DELETE FROM `categories` WHERE name='" . $curr_name . "'";
        $adding_mi = $mysqli->query($query);
      }
      else {
        if ($qq_t->num_rows !== 0) {

          if ($qq_t) {
            while ($r = mysqli_fetch_assoc($qq_t)) {
              $id = $r['id'];
            }
          }

          //Gallery images
          $query = "SELECT path FROM `thermostats_images` WHERE prod_id='" . $id . "'";
          $adding_mi = $mysqli->query($query);

          if ($adding_mi) {
            while ($r = mysqli_fetch_assoc($adding_mi)) {
              $image = $r['path'];
              $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['path'];
              unlink($img_path);
            }
          }

          $query = "SELECT image FROM `thermostat` WHERE id='" . $id . "'";
          $adding_mi = $mysqli->query($query);

          if ($adding_mi) {
            while ($r = mysqli_fetch_assoc($adding_mi)) {
              $image = $r['image'];
              $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['image'];
              if ($r['image'] !== NULL) {
                unlink($img_path);
              }

            }
            $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $curr_name;
            if (is_dir($uploaddir)) {
              rmdir($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $curr_name);
            }
          }


          $query = "DELETE FROM `thermostat_feature` WHERE product_id='" . $id . "'";
          $adding_mi = $mysqli->query($query);

          $query = "DELETE FROM `thermostats_images` WHERE prod_id='" . $id . "'";
          $adding_mi = $mysqli->query($query);

          $query = "DELETE FROM `thermostat` WHERE name='" . $curr_name . "'";
          $adding_mi = $mysqli->query($query);
        }
      }
    }


    return TRUE;
  }

  public function update_data() {
    include 'application/connection.php';

    include_once 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;
    $res['type'] = 'prod';

    $id = NULL;
    if (isset($_POST['id']) && isset($_POST['ord'])) {
      $id = $_POST['id'];
      $ord = $_POST['ord'];


      $add_mi = 'UPDATE categories SET ord = ' . $ord . ' WHERE id = ' . $id;
      $adding_miq = $mysqli->query($add_mi);

      //берем имя папки чтобы переименовать
      $query = "SELECT name FROM categories  WHERE id='" . $id . "'";
      $n_img = $mysqli->query($query);

      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $pn = $r;
        }
      }


      $old_name = $pn['name'];



      $name = NULL;
      if (isset($_POST['name'])) {
        $title = strtoupper($_POST['name']);

        $add_mi = 'UPDATE categories SET title = "' . $title . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);


        $name = str_replace(' ', '-', mb_strtolower($_POST['name']));
        $add_mi = 'UPDATE categories SET name = "' . $name . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);

      }

            rename($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $old_name, $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $name);


      //берем имя папки чтобы переименовать
      $query = "SELECT image FROM categories  WHERE id='" . $id . "'";
      $n_img = $mysqli->query($query);

      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $oin = $r;
        }
      }

      $old_image_name = $oin['image'];
      $exploded = explode('/', $old_image_name);
      $main_filename = end($exploded);


      $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $main_filename . '" WHERE id=' . $id;
      $adding_miq = $mysqli->query($add_mi);


      $parent_id = NULL;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE categories SET parent_id = "' . $parent_id . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);
      }


      ///////////////

      $img_q = "SELECT id FROM categories  WHERE name='" . $name . "'";
      $query = $mysqli->query($img_q);

      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $cid = $r;
        }
      }

      $cid = $cid['id'];


      $query = $mysqli->query(
        "SELECT id, name, ord FROM products  WHERE parent_id='" . $parent_id .
        "' UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $parent_id .
        "' UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $parent_id .
        "' UNION SELECT id, name, ord FROM bildmotive_catalog  WHERE parent_id='" . $parent_id .
        "' ORDER BY ord"
      );

      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $tmp['id'][] = $r['id'];
          $tmp['ord'][] = $r['ord'];
          $tmp['name'][] = $r['name'];
          $item[] = $r;

        }
      }

      $tmp['id'][] = $cid;
      $tmp['ord'][] = $id;
      $tmp['name'][] = $name;

      $ll['id'] = $cid;
      $ll['ord'] = $id;
      $ll['name'] = $name;
      $item[] = $ll;

      array_multisort($tmp['ord'], SORT_ASC, $item);

      $fin_ind = 10;
      foreach ($item as $it) {
        $q_p = "SELECT id FROM products  WHERE name='" . $it['name'] . "'";
        $q_c = "SELECT id FROM categories  WHERE name='" . $it['name'] . "'";
        $q_t = "SELECT id FROM thermostat  WHERE name='" . $it['name'] . "'";
        $q_b = "SELECT id FROM bildmotive_catalog  WHERE name='" . $it['name'] . "'";

        $qq_p = $mysqli->query($q_p);
        $qq_c = $mysqli->query($q_c);
        $qq_t = $mysqli->query($q_t);
        $qq_b = $mysqli->query($q_b);

        if ($qq_p->num_rows !== 0) {
          $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
          $adding_mi = $mysqli->query($add_mi);
        }
        else {
          if ($qq_c->num_rows !== 0) {
            $add_mi = 'UPDATE categories SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
            $adding_mi = $mysqli->query($add_mi);
          }
          else {
            if ($qq_t->num_rows !== 0) {
              $add_mi = 'UPDATE thermostat SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
              $adding_mi = $mysqli->query($add_mi);
            }
            else {
              if ($qq_t->num_rows !== 0) {
                $add_mi = 'UPDATE bildmotive_catalog SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
                $adding_mi = $mysqli->query($add_mi);
              }
              else {
                $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"';
                $adding_mi = $mysqli->query($add_mi);
              }
            }
          }
        }
        $fin_ind += 10;

      }

      ////////////////
      //загрузка подписи
      if (isset($_FILES)) {
        if ($_FILES['category_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0744);
          }
          $uploadfile = $uploaddir . basename($_FILES['category_image']['name']);
          if ($_FILES['category_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $category_image = NULL;
            if (isset($_FILES['category_image']['name'])) {
              $category_image = $_FILES['category_image']['name'];
            }

            $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $category_image . '" WHERE id=' . $cid;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }

        }
      }


    }
    $res = TRUE;

    return $res;
  }
}
