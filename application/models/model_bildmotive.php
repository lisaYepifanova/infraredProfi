<?php

class Model_Bildmotive extends Model {
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


    $query = $mysqli->query("SELECT * FROM bildmotive_catalog");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bildmotive_catalog'][] = $r;
      }
    }

    //modal menu
    $mm['arr_of_id'][] = 1;

    $query = $mysqli->query("SELECT id FROM bildmotive_images");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $mm['arr_of_id'][] = $r['id'];
      }

    }

    $res['max_id_gallery'] = max($mm['arr_of_id']);

    $query = $mysqli->query("SELECT * FROM bildmotive WHERE name='" . $curr . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM bildmotive  ORDER BY ord");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bildmotive_items'][] = $r;
      }
    }


    $curr_id = $res[0]['id'];

    $img_q = "SELECT * FROM bildmotive_images  WHERE category_id='" . $curr_id . "' ORDER BY name";
    $query = $mysqli->query($img_q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['images'][] = $r;
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

    $query = $mysqli->query("SELECT * FROM categories");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;

    return $res;
  }

  public function add_data() {
    include 'application/connection.php';

    $res = [];


    $query = $mysqli->query("SELECT * FROM bildmotive_catalog");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bildmotive_catalog'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM bildmotive  ORDER BY ord");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bildmotive_items'][] = $r;
      }
    }


    $query = $mysqli->query("SELECT id FROM bildmotive_images");
    if ($query->num_rows !== 0) {
      while ($r = mysqli_fetch_assoc($query)) {
        $mm['arr_of_id'][] = $r['id'];
      }
    }
    else {
      $mm['arr_of_id'][] = 0;
    }

    $res['max_id_gallery'] = max($mm['arr_of_id']);

    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;

    return $res;
  }


  public function update_data() {
    include 'application/connection.php';
    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;
    $res['type'] = 'prod';

    $name = NULL;
    $ord = NULL;
    $id = NULL;


    if ($_POST['category_name'] && isset($_POST['ord']) && isset($_POST['id'])) {
      $name = $_POST['category_name'];

      $title = str_replace('ü', '&uuml;', $name);
      $title = str_replace('ö', '&ouml;', $title);
      $title = str_replace('ä', '&auml;', $title);
      $title = str_replace('Ä', '&Auml;', $title);
      $title = str_replace('Ü', '&Uuml;', $title);
      $title = str_replace('Ö', '&Ouml;', $title);
      $title = str_replace('ß', '&szlig', $title);


      $name = str_replace('ü', 'u', $name);
      $name = str_replace('ö', 'o', $name);
      $name = str_replace('ä', 'a', $name);
      $name = str_replace('Ä', 'A', $name);
      $name = str_replace('Ü', 'U', $name);
      $name = str_replace('Ö', 'O', $name);
      $name = str_replace('ß', 'ss', $name);

      $ord = $_POST['ord'];
      $id = $_POST['id'] - 1;

      $add_mi = 'UPDATE bildmotive SET title="' . $title . '" WHERE id=' . $id;
      $adding_miq = $mysqli->query($add_mi);


      if (isset($_POST['category_name'])) {
        $old_name_query = $mysqli->query('SELECT name FROM bildmotive WHERE id=' . $id);
        if ($old_name_query) {
          while ($r = mysqli_fetch_assoc($old_name_query)) {
            $old_name_arr = $r;
          }
        }

        $old_name = $old_name_arr['name'];

        $name = str_replace(' ', '-', mb_strtolower($name));
        $add_mi = 'UPDATE bildmotive SET name = "' . $name . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);


        rename($_SERVER['DOCUMENT_ROOT'] . '/img/bildmotive/' . $old_name, $_SERVER['DOCUMENT_ROOT'] . '/img/bildmotive/' . $name);

      }


      $add_mi = 'UPDATE bildmotive SET ord = "' . $ord . '" WHERE id=' . $id;
      $adding_miq = $mysqli->query($add_mi);


      $query = $mysqli->query(
        "SELECT * FROM bildmotive ORDER BY ord"
      );

      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $tmp['ord'][] = $r['ord'];
          $item[] = $r;

        }
      }

      array_multisort($tmp['ord'], SORT_ASC, $item);

      $fin_ind = 10;
      foreach ($item as $it) {
        $add_mi = 'UPDATE bildmotive SET ord = "' . $fin_ind . '" WHERE id="' . $it['id'] . '"';
        $adding_mi = $mysqli->query($add_mi);
        $fin_ind += 10;
      }


      $dirname = $name;


      //загрузка главного изображения
      if (isset($_FILES)) {
        if ($_FILES['category_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'bildmotive/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0767);
          }

          $symb_arr = [' ', '(', ')'];

          $upfilename = str_replace($symb_arr, '-', basename($_FILES['category_image']['name']));

          /*
                    $upfilename = str_replace('ü', 'u', $upfilename);
          $upfilename = str_replace('ö', 'o', $upfilename);
          $upfilename = str_replace('ä', 'a', $upfilename);
          $upfilename = str_replace('Ä', 'A', $upfilename);
          $upfilename = str_replace('Ü', 'U', $upfilename);
          $upfilename = str_replace('Ö', 'O', $upfilename);
          $upfilename = str_replace('ß', 'ss', $upfilename);
*/

          $uploadfile = $uploaddir . $upfilename;
          if ($_FILES['category_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
              chmod($uploadfile, 0767);
              $result['info'][] = 'Image uploaded successfully.';
            }

            $prod_main_image = NULL;
            if (isset($_FILES['category_image']['name'])) {
              $prod_main_image = $upfilename;
            }

            $add_mi = 'UPDATE bildmotive SET image = "' . $prod_main_image . '" WHERE id=' . $id;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }
        }
      }


      if (isset($_FILES)) {
        if (isset($_FILES['prod_image'])) {
          foreach ($_FILES['prod_image']['name'] as $name => $item) {
            if ($_FILES['prod_image']['size'][$name]['image'] > 0) {
              $uploaddir = IMG_PROJ_PATH . 'bildmotive/' . $dirname . '/';
              if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0767);
              }
              $symb_arr = [' ', '(', ')'];

              $upfilename = str_replace($symb_arr, '-', basename($_FILES['prod_image']['name'][$name]['image']));


              $uploadfile = $uploaddir . $upfilename;

              if ($_FILES['prod_image']['size'][$name]['image'] <= $_POST['MAX_FILE_SIZE']) {
                if (move_uploaded_file($_FILES['prod_image']['tmp_name'][$name]['image'], $uploadfile)) {
                  chmod($uploadfile, 0767);
                  $result['info'][] = 'Image uploaded successfully.';
                }

                $prod_image = NULL;
                if (isset($_FILES['prod_image']['name'][$name]['image'])) {
                  $prod_image = $upfilename;
                }

                $add_mi = 'INSERT INTO bildmotive_images (image, category_id, name) VALUES ("' . $prod_image . '", "' . $id . '", "' . $_POST['prod_image'][$name]['name'] . '")';
                $adding_miq = $mysqli->query($add_mi);

              }
              else {
                $result['info'][] = 'Image is too large.';
              }
            }
          }
        }
      }


      if (isset($_POST['prod_image'])) {
        foreach ($_POST['prod_image'] as $item) {
          $add_mi = 'UPDATE bildmotive_images SET name ="' . $item['name'] . '" WHERE id="' . $item['id'] . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
      }


      if (isset($_POST['del-image'])) {
        foreach ($_POST['del-image'] as $row) {
          $query = $mysqli->query("SELECT image FROM bildmotive_images WHERE id='" . $row . "'");

          if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
              $img = $r['image'];
            }
          }

          $query = $mysqli->query("SELECT name FROM bildmotive_catalog WHERE id='1'");

          if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
              $bname = $r['name'];
            }
          }

          $ulink = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $bname . '/' . $dirname . '/' . $img;
          if (is_file($ulink)) {
            unlink($ulink);
          }


          $query = "DELETE FROM `bildmotive_images` WHERE id='" . $row . "'";
          if ($adding_mi = $mysqli->query($query)) {
            $info[] = 'deleted info from bildmotive images';
          }
          else {
            $info[] = 'cant delete info from bildmotive images';
          }
        }
      }
    }
    $res = TRUE;

    return $res;
  }

  public function save_data() {
    include 'application/connection.php';
    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;
    $res['type'] = 'prod';

    $name = NULL;
    $ord = NULL;


    if ($_POST['category_name'] && isset($_POST['ord'])) {
      $name = $_POST['category_name'];
      $ord = $_POST['ord'];

            $title = str_replace('ü', '&uuml;', $name);
      $title = str_replace('ö', '&ouml;', $title);
      $title = str_replace('ä', '&auml;', $title);
      $title = str_replace('Ä', '&Auml;', $title);
      $title = str_replace('Ü', '&Uuml;', $title);
      $title = str_replace('Ö', '&Ouml;', $title);
      $title = str_replace('ß', '&szlig', $title);

      $name = str_replace('ü', 'u', $name);
      $name = str_replace('ö', 'o', $name);
      $name = str_replace('ä', 'a', $name);
      $name = str_replace('Ä', 'A', $name);
      $name = str_replace('Ü', 'U', $name);
      $name = str_replace('Ö', 'O', $name);
      $name = str_replace('ß', 'ss', $name);


      $add_mi = 'INSERT INTO bildmotive  (title) VALUES ("' . $title . '")';
      $adding_miq = $mysqli->query($add_mi);

      $id_query = $query = $mysqli->query('SELECT id FROM bildmotive WHERE title="' . $title . '"');
      if ($id_query) {
        while ($r = mysqli_fetch_assoc($id_query)) {
          $id = $r['id'];
        }
      }

      if (isset($_POST['category_name'])) {

        $name = str_replace(' ', '-', mb_strtolower($name));
        $add_mi = 'UPDATE bildmotive SET name = "' . $name . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);


      }


      $add_mi = 'UPDATE bildmotive SET ord = "' . $ord . '" WHERE id=' . $id;
      $adding_miq = $mysqli->query($add_mi);


      $query = $mysqli->query(
        "SELECT * FROM bildmotive ORDER BY ord"
      );

      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $tmp['ord'][] = $r['ord'];
          $item[] = $r;

        }
      }

      array_multisort($tmp['ord'], SORT_ASC, $item);

      $fin_ind = 10;
      foreach ($item as $it) {
        $add_mi = 'UPDATE bildmotive SET ord = "' . $fin_ind . '" WHERE id="' . $it['id'] . '"';
        $adding_mi = $mysqli->query($add_mi);
        $fin_ind += 10;
      }


      $dirname = $name;


      //загрузка главного изображения
      if (isset($_FILES)) {
        if ($_FILES['category_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'bildmotive/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0767);
          }

          $symb_arr = [' ', '(', ')'];
          $upfilename = str_replace($symb_arr, '-', basename($_FILES['category_image']['name']));


          $uploadfile = $uploaddir . $upfilename;
          if ($_FILES['category_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
              chmod($uploadfile, 0767);
              $result['info'][] = 'Image uploaded successfully.';
            }

            $prod_main_image = NULL;
            if (isset($_FILES['category_image']['name'])) {
              $prod_main_image = $upfilename;
            }

            $add_mi = 'UPDATE bildmotive SET image = "' . $prod_main_image . '" WHERE id=' . $id;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }
        }
      }


      if (isset($_FILES)) {
        if (isset($_FILES['prod_image'])) {
          foreach ($_FILES['prod_image']['name'] as $name => $item) {
            if ($_FILES['prod_image']['size'][$name]['image'] > 0) {
              $uploaddir = IMG_PROJ_PATH . 'bildmotive/' . $dirname . '/';
              if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0767);
              }
              $symb_arr = [' ', '(', ')'];

              $upfilename = str_replace($symb_arr, '-', basename($_FILES['prod_image']['name'][$name]['image']));


              $uploadfile = $uploaddir . $upfilename;

              if ($_FILES['prod_image']['size'][$name]['image'] <= $_POST['MAX_FILE_SIZE']) {
                if (move_uploaded_file($_FILES['prod_image']['tmp_name'][$name]['image'], $uploadfile)) {
                  chmod($uploadfile, 0767);
                  $result['info'][] = 'Image uploaded successfully.';
                }

                $prod_image = NULL;
                if (isset($_FILES['prod_image']['name'][$name]['image'])) {
                  $prod_image = $upfilename;
                }

                $add_mi = 'INSERT INTO bildmotive_images (image, category_id, name) VALUES ("' . $prod_image . '", "' . $id . '", "' . $_POST['prod_image'][$name]['name'] . '")';
                $adding_miq = $mysqli->query($add_mi);

              }
              else {
                $result['info'][] = 'Image is too large.';
              }
            }
          }
        }
      }


      if (isset($_POST['prod_image'])) {
        foreach ($_POST['prod_image'] as $item) {
          $add_mi = 'UPDATE bildmotive_images SET name ="' . $item['name'] . '" WHERE id=' . $item['id'];
          $adding_miq = $mysqli->query($add_mi);
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


    $query = $mysqli->query("SELECT * FROM bildmotive WHERE name='" . $curr_name . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    $info[] = '';

    $res = $res[0];

    $query = "DELETE FROM `bildmotive_images` WHERE category_id='" . $res['id'] . "'";
    if ($adding_mi = $mysqli->query($query)) {
      $info[] = 'deleted info from bildmotive images';
    }
    else {
      $info[] = 'cant delete info from bildmotive images';
    }

    include 'application/removedir.php';

    $dir = $_SERVER['DOCUMENT_ROOT'] . '/img/bildmotive/' . $res['name'];

    if (is_dir($dir)) {
      if (removeDirectory($dir)) {
        $info[] = 'deleted dir';
      }
      else {
        $info[] = 'cant delete dir';
      }
    }
    else {
      $info[] = 'this category hadnt dir';
    }


    $query = "DELETE FROM `bildmotive` WHERE name='" . $curr_name . "'";
    if ($adding_mi = $mysqli->query($query)) {
      $info[] = ' deleted info from bildmotive';
    }
    else {
      $info[] = 'cant delete info from bildmotive';
    }


    return $info;
  }
}
