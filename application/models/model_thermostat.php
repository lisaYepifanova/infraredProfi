<?php

class Model_Thermostat extends Model {
  public function get_data() {
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

    $q = "SELECT * FROM thermostat WHERE name='" . $curr . "'";
    $query = $mysqli->query($q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    $img_q = "SELECT * FROM thermostats_images  WHERE prod_id=" . $res[0]['id'];
    $query = $mysqli->query($img_q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['gallery'][] = $r;
      }
    }

    $img_q = "SELECT * FROM thermostat_feature WHERE product_id=" . $res[0]['id'];
    $query = $mysqli->query($img_q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['features'][] = $r;
      }
    }


    $coloursq = "SELECT * FROM thermostats_colours  WHERE thermostat_id=" . $res[0]['id'];
    $query = $mysqli->query($coloursq);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $c = "SELECT * FROM colours  WHERE id=" . $r['colour_id'];
        $q = $mysqli->query($c);
        $res['colours'][] = mysqli_fetch_assoc($q);
      }
    }

    include_once 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;


    $query = $mysqli->query(
      "SELECT * FROM product_document WHERE thermostat_id=" . $res[0]['id']
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $query_doc = $mysqli->query(
          "SELECT * FROM documents WHERE id=" . $r['id']
        );

        if ($query_doc) {
          while ($rd = mysqli_fetch_assoc($query_doc)) {
            $res['doc'][] = $rd;
          }
        }
      }
    }

    $query = $mysqli->query(
      "SELECT id, title, ord, parent_id FROM products  " .
      " UNION SELECT id, title, ord, parent_id FROM  categories " .
      " UNION SELECT id, title, ord, parent_id FROM thermostat  " .
      " ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM categories ");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
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


    $query = $mysqli->query("SELECT * FROM colours ");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['colours'][] = $r;
      }
    }


    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;


    $query = $mysqli->query(
      "SELECT id, title, ord, parent_id FROM products  " .
      " UNION SELECT id, title, ord, parent_id FROM  categories " .
      " UNION SELECT id, title, ord, parent_id FROM thermostat  " .
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


    $name = NULL;
    $ord = NULL;

    if (isset($_POST['name']) && isset($_POST['ord'])) {
      $name = $_POST['name'];
      $ord = $_POST['ord'];


      $add_mi = 'INSERT INTO thermostat (title) VALUES ("' . $name . '")';
      $adding_miq = $mysqli->query($add_mi);


      $img_q = "SELECT id FROM thermostat  WHERE title='" . $name . "'";
      $query = $mysqli->query($img_q);

      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $pid = $r;
        }
      }

      $pid = $pid['id'];

      if (isset($_POST['name'])) {
        $name = str_replace(' ', '-', mb_strtolower($_POST['name']));
        $add_mi = 'UPDATE thermostat SET name = "' . $name . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }

      $add_mi = 'UPDATE thermostat SET ord = "' . $ord . '" WHERE id=' . $pid;
      $adding_miq = $mysqli->query($add_mi);


      $query = $mysqli->query(
        "SELECT id, name, ord FROM products  WHERE parent_id='" . $_POST['parent_id'] .
        "' UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $_POST['parent_id'] .
        "' UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $_POST['parent_id'] .
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

      $tmp['id'][] = $pid;
      $tmp['ord'][] = $ord;
      $tmp['name'][] = $name;

      $ll['id'] = $pid;
      $ll['ord'] = $ord;
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


      $dirname = $name;
      $parent_id = NULL;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE thermostat SET parent_id = ' . $parent_id . ' WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }

      //загрузка главного изображения
      if (isset($_FILES)) {
        if ($_FILES['prod_main_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0744);
          }
          $uploadfile = $uploaddir . basename($_FILES['prod_main_image']['name']);
          if ($_FILES['prod_main_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['prod_main_image']['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $prod_main_image = NULL;
            if (isset($_FILES['prod_main_image']['name'])) {
              $prod_main_image = $_FILES['prod_main_image']['name'];
            }

            $add_mi = 'UPDATE thermostat SET image = "products/' . $name . '/' . $prod_main_image . '" WHERE id=' . $pid;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }

        }
      }

      //description
      $description = NULL;
      if (isset($_POST['description-textarea'])) {
        $description = $_POST['description-textarea'];

        $add_mi = 'UPDATE thermostat SET description = "' . $description . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }


      //description
      $short_description = NULL;
      if (isset($_POST['short-description-textarea'])) {
        $short_description = $_POST['short-description-textarea'];

        $add_mi = 'UPDATE thermostat SET short_description = "' . $short_description . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }


      if (isset($_POST['prod_feature']) && isset($_POST['has-prod-feature'])) {
        if ($_POST['has-prod-feature'] == 1) {
          $add_q = 'UPDATE thermostat SET has_qualities = "' . $_POST['has-prod-feature'] . '" WHERE id=' . $pid;
          $adding_info_query = $mysqli->query($add_q);

          foreach ($_POST['prod_feature'] as $item) {
            if (isset($item['name']) and isset($item['value']) and $item['name'] !== '') {
              $add_q = "INSERT INTO thermostat_feature (feature, value, product_id) VALUES ('" . $item['name'] . "', '" . $item['value'] . "', '" . $pid . "')";
              $adding_info_query = $mysqli->query($add_q);
            }
          }
        }
      }

      if (isset($_POST['show-similar'])) {
        if ($_POST['show-similar'] == 1) {
          $add_q = 'UPDATE thermostat SET has_similar_products = "' . $_POST['show-similar'] . '" WHERE id=' . $pid;
          $adding_info_query = $mysqli->query($add_q);
        }
      }

      if (isset($_FILES)) {
        if (isset($_FILES['prod_image'])) {
          foreach ($_FILES['prod_image']['name'] as $name => $item) {
            if ($_FILES['prod_image']['size'][$name] > 0) {
              $uploaddir = IMG_PROJ_PATH . 'products/' . $dirname . '/';
              if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0744);
              }

              $uploadfile = $uploaddir . basename($_FILES['prod_image']['name'][$name]);
              if ($_FILES['prod_image']['size'][$name] <= $_POST['MAX_FILE_SIZE']) {
                if (move_uploaded_file($_FILES['prod_image']['tmp_name'][$name], $uploadfile)) {
                  $result['info'][] = 'Image uploaded successfully.';
                }

                $prod_image = NULL;
                if (isset($_FILES['prod_image']['name'][$name])) {
                  $prod_image = $_FILES['prod_image']['name'][$name];
                }

                $add_mi = 'INSERT INTO thermostats_images (path, prod_id) VALUES ("products/' . $dirname . '/' . $prod_image . '", "' . $pid . '")';
                $adding_miq = $mysqli->query($add_mi);

              }
              else {
                $result['info'][] = 'Image is too large.';
              }
            }
          }
        }
      }


    }


    $res = TRUE;

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';
    include_once 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;
    $res['type'] = 'prod';

    $name = NULL;
    $ord = NULL;

    if (isset($_POST['id']) && isset($_POST['ord'])) {
      $pid = $_POST['id'];
      $ord = $_POST['ord'];


      $add_mi = 'UPDATE thermostat SET ord = ' . $ord . ' WHERE id = ' . $pid;
      $adding_miq = $mysqli->query($add_mi);

      //берем имя папки чтобы переименовать
      $query = "SELECT name FROM thermostat  WHERE id='" . $pid . "'";
      $n_img = $mysqli->query($query);

      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $pn = $r;
        }
      }

      $old_name = $pn['name'];


      if (isset($_POST['name'])) {
        $title = $_POST['name'];
        $add_mi = 'UPDATE thermostat SET title = "' . $title . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);

        $name = str_replace(' ', '-', mb_strtolower($_POST['name']));
        $add_mi = 'UPDATE thermostat SET name = "' . $name . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }

      rename($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $old_name, $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $name);

      $add_mi = 'UPDATE thermostat SET ord = "' . $ord . '" WHERE id=' . $pid;
      $adding_miq = $mysqli->query($add_mi);


      //берем имя папки чтобы переименовать
      $query = "SELECT image FROM thermostat  WHERE id='" . $pid . "'";
      $n_img = $mysqli->query($query);

      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $oin = $r;
        }
      }

      $old_image_name = $oin['image'];
      $exploded = explode('/', $old_image_name);
      $main_filename = end($exploded);


      $add_mi = 'UPDATE thermostat SET image = "products/' . $name . '/' . $main_filename . '" WHERE id=' . $pid;
      $adding_miq = $mysqli->query($add_mi);

      ///
      ///


      // переименование путей изображений галереи
      $query = "SELECT * FROM thermostats_images WHERE prod_id='" . $pid . "'";
      $pimage = $mysqli->query($query);

      if ($pimage) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $oin = $r;

          $old_image_name = $oin['path'];
          $exploded = explode('/', $old_image_name);
          $main_filename = end($exploded);

          $query = 'UPDATE thermostats_images SET path="products/' . $name . '/' . $main_filename . '"   WHERE id="' . $oin['id'] . '"';
          $n_img = $mysqli->query($query);
        }
      }


      $query = $mysqli->query(
        "SELECT id, name, ord FROM products  WHERE parent_id='" . $_POST['parent_id'] .
        "' UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $_POST['parent_id'] .
        "' UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $_POST['parent_id'] .
        "' UNION SELECT id, name, ord FROM bildmotive_catalog  WHERE parent_id='" . $_POST['parent_id'] .
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

      $tmp['id'][] = $pid;
      $tmp['ord'][] = $ord;
      $tmp['name'][] = $name;

      $ll['id'] = $pid;
      $ll['ord'] = $ord;
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


      $dirname = $name;
      $parent_id = NULL;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE thermostat SET parent_id = ' . $parent_id . ' WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }

      //загрузка главного изображения
      if (isset($_FILES)) {
        if ($_FILES['prod_main_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0744);
          }
          $uploadfile = $uploaddir . basename($_FILES['prod_main_image']['name']);
          if ($_FILES['prod_main_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['prod_main_image']['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $prod_main_image = NULL;
            if (isset($_FILES['prod_main_image']['name'])) {
              $prod_main_image = $_FILES['prod_main_image']['name'];
            }

            $add_mi = 'UPDATE thermostat SET image = "products/' . $name . '/' . $prod_main_image . '" WHERE id=' . $pid;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }

        }
      }

      //description
      $description = NULL;
      if (isset($_POST['description-textarea'])) {
        $description = $_POST['description-textarea'];

        $add_mi = 'UPDATE thermostat SET description = "' . $description . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }


      //description
      $short_description = NULL;
      if (isset($_POST['short-description-textarea'])) {
        $short_description = $_POST['short-description-textarea'];

        $add_mi = 'UPDATE thermostat SET short_description = "' . $short_description . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }


      if (isset($_POST['prod_feature']) && isset($_POST['has-prod-feature'])) {
        if ($_POST['has-prod-feature'] == 1) {
          $add_q = 'UPDATE thermostat SET has_qualities = "' . $_POST['has-prod-feature'] . '" WHERE id=' . $pid;
          $adding_info_query = $mysqli->query($add_q);


          $del_p = "DELETE FROM `thermostat_feature` WHERE `product_id`='" . $pid . "'";
          $adding_miq = $mysqli->query($del_p);

          foreach ($_POST['prod_feature'] as $item) {
            if (isset($item['name']) and isset($item['value']) and $item['name'] !== '') {
              $add_q = "INSERT INTO thermostat_feature (feature, value, product_id) VALUES ('" . $item['name'] . "', '" . $item['value'] . "', '" . $pid . "')";
              $adding_info_query = $mysqli->query($add_q);
            }
          }
        }
      }

      if (isset($_POST['show-similar'])) {
        if ($_POST['show-similar'] == 1) {
          $add_q = 'UPDATE thermostat SET has_similar_products = "' . $_POST['show-similar'] . '" WHERE id=' . $pid;
          $adding_info_query = $mysqli->query($add_q);
        }
      }

      if (isset($_FILES)) {
        if (isset($_FILES['prod_image'])) {
          foreach ($_FILES['prod_image']['name'] as $name => $item) {
            if ($_FILES['prod_image']['size'][$name] > 0) {
              $uploaddir = IMG_PROJ_PATH . 'products/' . $dirname . '/';
              if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0744);
              }

              $uploadfile = $uploaddir . basename($_FILES['prod_image']['name'][$name]);
              if ($_FILES['prod_image']['size'][$name] <= $_POST['MAX_FILE_SIZE']) {
                if (move_uploaded_file($_FILES['prod_image']['tmp_name'][$name], $uploadfile)) {
                  $result['info'][] = 'Image uploaded successfully.';
                }

                $prod_image = NULL;
                if (isset($_FILES['prod_image']['name'][$name])) {
                  $prod_image = $_FILES['prod_image']['name'][$name];
                }

                $add_mi = 'INSERT INTO thermostats_images (path, prod_id) VALUES ("products/' . $dirname . '/' . $prod_image . '", "' . $pid . '")';
                $adding_miq = $mysqli->query($add_mi);

              }
              else {
                $result['info'][] = 'Image is too large.';
              }
            }
          }
        }
      }


      if (isset($_POST['del-image'])) {
        foreach ($_POST['del-image'] as $row) {
          $query = "SELECT path FROM thermostats_images  WHERE id='" . $row . "'";
          $del_img = $mysqli->query($query);

          if ($del_img) {
            while ($r = mysqli_fetch_assoc($del_img)) {
              $cid = $r;
            }
          }

          unlink(IMAGEPATH . 'products/' . $dirname . $cid['path']);
          $query = "DELETE FROM thermostats_images  WHERE id='" . $row . "'";
          $del_img = $mysqli->query($query);
        }
      }


    }
    $res = TRUE;

    return $res;
  }
}
