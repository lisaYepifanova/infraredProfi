<?php

class Model_Bildmotive_Catalog extends Model {
  public function get_data() {
    include 'application/connection.php';

    $query = $mysqli->query("SELECT * FROM bildmotive_catalog");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bildmotive_catalog'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM bildmotive ORDER BY ord");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bildmotive'][] = $r;
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

        $query = $mysqli->query("SELECT * FROM categories ");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    include_once 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;

    return $res;
  }

 public function update_data() {
    include 'application/connection.php';

    include_once 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;
    $res['type'] = 'prod';


      $id = $_POST['id'];
      $ord = $_POST['ord'];


      $add_mi = 'UPDATE bildmotive_catalog SET ord = ' . $ord . ' WHERE id = '.$id;
      $adding_miq = $mysqli->query($add_mi);

      if (isset($_POST['description-textarea'])) {
        $add_mi = 'UPDATE bildmotive_catalog SET description = "' . $_POST['description-textarea'] . '" WHERE id = ' . $id;
        $adding_miq = $mysqli->query($add_mi);
      }
      $name = NULL;
      if (isset($_POST['name'])) {
        $title = strtoupper($_POST['name']);

        $add_mi = 'UPDATE bildmotive_catalog SET title = "' . $title . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);


        $name = str_replace(' ', '-', mb_strtolower($_POST['name']));
        $add_mi = 'UPDATE bildmotive_catalog SET name = "' . $name . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);

      }


      $parent_id = NULL;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE bildmotive_catalog SET parent_id = "' . $parent_id . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);
      }


      $cid = 1;


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
            }else {
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
          $uploaddir = IMG_PROJ_PATH . '/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0767);
          }
          $uploadfile = $uploaddir . basename($_FILES['category_image']['name']);
          if ($_FILES['category_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
              chmod($uploadfile, 0767);
              $result['info'][] = 'Image uploaded successfully.';
            }

            $category_image = NULL;
            if (isset($_FILES['category_image']['name'])) {
              $category_image = $_FILES['category_image']['name'];
            }

            $add_mi = 'UPDATE bildmotive_catalog SET image = "bildmotive/' . $category_image . '" WHERE id=' . $cid;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }

        }
      }


    return $res;
  }
}
