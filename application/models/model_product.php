<?php

class Model_Product extends Model {
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

    $lang = getLanguage();

    $query = $mysqli->query(
      "SELECT id, title, ord, parent_id FROM products WHERE lid=" . $lang . "   " .
      " UNION SELECT id, title, ord, parent_id FROM  categories WHERE lid=" . $lang . "  " .
      " UNION SELECT id, title, ord, parent_id FROM thermostat WHERE lid=" . $lang . "  " .
      " UNION SELECT id, title, ord, parent_id FROM bildmotive_catalog WHERE lid=" . $lang . "  " .
      " ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items'][] = $r;
      }
    }

    $querym = $mysqli->query("SELECT id FROM product_features");
    if ($querym) {

      while ($r = mysqli_fetch_assoc($querym)) {
        $rr['arr_of_f_id'][] = $r['id'];
      }
    }

    $res['max_feature_id'] = max($rr['arr_of_f_id']);

    $q = "SELECT * FROM products  WHERE name='" . $curr . "' AND lid='" . $lang . "'";
    $query = $mysqli->query($q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM categories WHERE lid=" . $lang . " ");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }


    if ($lang == 2) {
      $img_q = "SELECT * FROM images  WHERE eng_prod_id='" . $res[0]['id'] . "'";
    }
    else {
      $img_q = "SELECT * FROM images  WHERE prod_id='" . $res[0]['id'] . "'";
    }

    $query = $mysqli->query($img_q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['gallery'][] = $r;
      }
    }

    $img_q = "SELECT * FROM colours";
    $query = $mysqli->query($img_q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $c = "SELECT id FROM products_colours  WHERE colour_id=" . $r['id'] . " AND product_id=" . $res[0]['id'];

        $q = mysqli_fetch_assoc($mysqli->query($c));

        if ($q) {
          $r['checked'] = TRUE;
        }
        else {
          $r['checked'] = FALSE;
        }

        $res['all_colours'][] = $r;
      }
    }


    $coloursq = "SELECT * FROM products_colours  WHERE product_id=" . $res[0]['id'];
    $query = $mysqli->query($coloursq);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $c = "SELECT * FROM colours  WHERE id=" . $r['colour_id'];
        $q = $mysqli->query($c);
        $res['colours'][] = mysqli_fetch_assoc($q);
      }
    }


    $sizes_category = $res[0]['category_size_id'];
    $q = 'SELECT * FROM sizes WHERE category_size_id="' . $sizes_category . '" AND lid="' . $lang . '" ORDER BY id';

    $query = $mysqli->query($q);
    $sizes = [];
    if ($query) {
      while ($s = mysqli_fetch_assoc($query)) {
        $sizes[] = $s;
      }
    }

    include_once 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;
    $res['sizes'] = $sizes;


    //selecting indexes of documents
    $query = $mysqli->query(
      "SELECT * FROM product_document WHERE product_id=" . $res[0]['id']
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

    $q = 'SELECT * FROM product_features WHERE product_id="' . $res[0]['id'] . '" ORDER BY id';

    $query = $mysqli->query($q);
    if ($query) {
      while ($s = mysqli_fetch_assoc($query)) {
        $res['features'][] = $s;
      }
    }


    $query = $mysqli->query(
      "SELECT * FROM product_thermostat WHERE lid=" . $lang
    );

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        if ($row['id'] !== '2' or ($row['id'] == '2' and $res[0]['has_thermostat'] == '1')) {
          $res['thermostats_info'][] = $row;
        }
      }
    }

    $q_text = "SELECT * FROM principles WHERE lid= '" . $lang . "'";

    $query = $mysqli->query($q_text);

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $res['principles'][] = $row;
      }
    }

    $query = $mysqli->query(
      "SELECT * FROM garantie WHERE lid = '" . $lang . "'"
    );

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $res['garantie'] = $row;

      }
    }

    $query = $mysqli->query(
      "SELECT * FROM product_energie"
    );

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $res['energie'] = $row;
      }
    }


    $query = $mysqli->query(
      "SELECT * FROM principles WHERE id='" . $res[0]['principle'] . "'"
    );

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $res['principle_info'][] = $row;
      }
    }


    return $res;
  }

  public function add_data() {
    include 'application/connection.php';

    $lang = getLanguage();
    $res = [];

    $query = $mysqli->query("SELECT * FROM categories WHERE lid='" . $lang . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }


    $query = $mysqli->query("SELECT * FROM colours");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['colours'][] = $r;
      }
    }


    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;


    $query = $mysqli->query(
      "SELECT id, title, ord, parent_id FROM products WHERE lid=" . $lang . " " .
      " UNION SELECT id, title, ord, parent_id FROM  categories WHERE lid=" . $lang . " " .
      " UNION SELECT id, title, ord, parent_id FROM thermostat  WHERE lid=" . $lang . " " .
      " ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items'][] = $r;
      }
    }

    $q_text = "SELECT * FROM principles WHERE lid= '" . $lang . "'";

    $query = $mysqli->query($q_text);

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $res['principles'][] = $row;
      }
    }

    return $res;
  }

  public function save_data() {
    include 'application/connection.php';
    include 'application/string_convertion.php';

    $lang = getLanguage();
    $name = NULL;
    $ord = NULL;

    if (isset($_POST['name']) && isset($_POST['ord'])) {
      $title = $_POST['name'];
      $ord = $_POST['ord'];
      $name = stringConvertion($title);

      $dirname = $name;

      $p_tr_id = 0;
      $parent_id = 0;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];
      }

      if ($parent_id !== '0') {
        //имя родителя
        $img_q = "SELECT name FROM categories  WHERE id='" . $parent_id . "'";
        $query = $mysqli->query($img_q);
        if ($query) {
          while ($r = mysqli_fetch_assoc($query)) {
            $p_name = $r;
          }
        }
        $p_name = $p_name['name'];

        //имя аналога родителя
        if ($lang == '2') {
          $img_q = "SELECT de FROM page_alias  WHERE en='" . $p_name . "'";
          $query = $mysqli->query($img_q);
          if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
              $t_name = $r;
            }
          }
          $t_name = $t_name['de'];
        }
        else {
          $img_q = "SELECT en FROM page_alias  WHERE de='" . $p_name . "'";
          $query = $mysqli->query($img_q);
          if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
              $t_name = $r;
            }
          }
          $t_name = $t_name['en'];
        }


        //айди аналога родителя
        $img_q = "SELECT id FROM categories  WHERE name='" . $t_name . "'";
        $query = $mysqli->query($img_q);
        if ($query) {
          while ($r = mysqli_fetch_assoc($query)) {
            $p_tr_id = $r;
          }
        }
        $p_tr_id = $p_tr_id['id'];
      }


      //создаем запись с этим именем
      $add_mi = 'INSERT INTO products (title, name, category_size_id, ord, lid, parent_id) VALUES ("' . $title . '", "' . $name . '", "' . $name . '", "' . $ord . '", "' . $lang . '", "' . $parent_id . '")';
      $adding_miq = $mysqli->query($add_mi);

      //и дубликат для перевода
      if ($lang == 2) {
        $add_mi = 'INSERT INTO products (title, name, category_size_id, ord, lid, parent_id) VALUES ("' . $title . '", "' . $name . '", "' . $name . '", "' . $ord . '", "1", "' . $p_tr_id . '")';
      }
      else {
        $add_mi = 'INSERT INTO products (title, name, category_size_id, ord, lid, parent_id) VALUES ("' . $title . '", "' . $name . '", "' . $name . '", "' . $ord . '", "2", "' . $p_tr_id . '")';

      }

      $adding_miq = $mysqli->query($add_mi);

      //пишем в алиасы
      $add_mi = 'INSERT INTO page_alias (de, en) VALUES ("' . $name . '", "' . $name . '")';
      $adding_miq = $mysqli->query($add_mi);

      //id записи
      $img_q = "SELECT id FROM products  WHERE title='" . $title . "' AND lid='" . $lang . "'";
      $query = $mysqli->query($img_q);
      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $pid = $r;
        }
      }
      $pid = $pid['id'];

      //id translate
      if ($lang == '2') {
        $img_q = "SELECT id FROM products  WHERE title='" . $title . "' AND lid='1'";
      }
      else {
        $img_q = "SELECT id FROM products  WHERE title='" . $title . "' AND lid='2' ";
      }
      $query = $mysqli->query($img_q);
      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $tid = $r;
        }
      }
      $tid = $tid['id'];

      //порядок
      $query = $mysqli->query(
        "SELECT id, name, ord FROM products  WHERE parent_id='" . $_POST['parent_id'] .
        "' AND lid='".$lang."' UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $_POST['parent_id'] .
        "' AND lid='".$lang."' UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $_POST['parent_id'] .
        "' AND lid='".$lang."' ORDER BY ord"
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
        $q_p = "SELECT id FROM products  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";
        $q_c = "SELECT id FROM categories  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";
        $q_t = "SELECT id FROM thermostat  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";
        $q_b = "SELECT id FROM bildmotive_catalog  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";

        $qq_p = $mysqli->query($q_p);
        $qq_c = $mysqli->query($q_c);
        $qq_t = $mysqli->query($q_t);
        $qq_b = $mysqli->query($q_t);

        if ($qq_p->num_rows !== 0) {
          $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
          $adding_mi = $mysqli->query($add_mi);
        }
        else {
          if ($qq_c->num_rows !== 0) {
            $add_mi = 'UPDATE categories SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
            $adding_mi = $mysqli->query($add_mi);
          }
          else {
            if ($qq_t->num_rows !== 0) {
              $add_mi = 'UPDATE thermostat SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
              $adding_mi = $mysqli->query($add_mi);
            }
            else {
              if ($qq_b->num_rows !== 0) {
                $add_mi = 'UPDATE bildmotive_catalog SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
                $adding_mi = $mysqli->query($add_mi);
              }
              else {
                $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
                $adding_mi = $mysqli->query($add_mi);
              }
            }
          }
        }
        $fin_ind += 10;

      }
//ord end

      //загрузка главного изображения
      if (isset($_FILES)) {
        if ($_FILES['prod_main_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0744);
          }

          $img_name = stringConvertion(basename($_FILES['prod_main_image']['name']));
          $uploadfile = $uploaddir . $img_name;

          if (move_uploaded_file($_FILES['prod_main_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $add_mi = 'UPDATE products SET image = "products/' . $name . '/' . $img_name . '" WHERE id=' . $pid;
          $adding_miq = $mysqli->query($add_mi);

          $add_mi = 'UPDATE products SET image = "products/' . $name . '/' . $img_name . '" WHERE id=' . $tid;
          $adding_miq = $mysqli->query($add_mi);
        }
      }

      //description
      $description = NULL;
      if (isset($_POST['description-textarea'])) {
        $description = $_POST['description-textarea'];

        $add_mi = 'UPDATE products SET description = "' . $description . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);

        $add_mi = 'UPDATE products SET description = "' . $description . '" WHERE id=' . $tid;
        $adding_miq = $mysqli->query($add_mi);
      }

      //есть ли термостат
      if (isset($_POST['optional-thermostat'])) {
        $add_mi = 'UPDATE products SET has_thermostat = "1" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);

        $add_mi = 'UPDATE products SET has_thermostat = "1" WHERE id=' . $tid;
        $adding_miq = $mysqli->query($add_mi);
      }



      $principle = 0;
      $t_principle = 0;
      if (isset($_POST['principle'])) {
      if ($lang == 2) {

          if ($_POST['principle'] == 4) {
            $principle = 4;
            $t_principle = 1;
          }
          else {
            if ($_POST['principle'] == 5) {
              $principle = 5;
              $t_principle = 2;
            }
            else {
              if ($_POST['principle'] == 6) {
                $principle = 6;
                $t_principle = 3;
              }
            }
          }
        }
        else {
          if ($_POST['principle'] == 1) {
            $principle = 1;
            $t_principle = 4;
          }
          else {
            if ($_POST['principle'] == 2) {
              $principle = 2;
              $t_principle = 5;
            }
            else {
              if ($_POST['principle'] == 3) {
                $principle = 3;
                $t_principle = 6;
              }
            }
          }
        }
      }

      if ($principle > 0) {
        $add_mi = 'UPDATE products SET principle = "' . $principle . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);

        $add_mi = 'UPDATE products SET principle = "' . $t_principle . '" WHERE id=' . $tid;
        $adding_miq = $mysqli->query($add_mi);
      }


      $is_decken = NULL;
      if (isset($_POST['is-decken'])) {
        $is_decken = $_POST['is-decken'];
        $add_mi = 'UPDATE products SET has_height = "' . $is_decken . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);

        $add_mi = 'UPDATE products SET has_height = "' . $is_decken . '" WHERE id=' . $tid;
        $adding_miq = $mysqli->query($add_mi);
      }
    }

//свойства
    if (isset($_POST['prod_feature'])) {
      foreach ($_POST['prod_feature'] as $item) {
        if (isset($item['name']) and isset($item['value']) and $item['name'] !== '') {
          if ($lang == 2) {
            $add_q = "INSERT INTO product_features (feature, value, product_id, lid) VALUES ('" . $item['name'] . "', '" . $item['value'] . "', '" . $pid . "', '2')";
            $adding_info_query = $mysqli->query($add_q);

            $add_q = "INSERT INTO product_features (feature, value, product_id, lid) VALUES ('" . $item['name'] . "', '" . $item['value'] . "', '" . $tid . "', '1')";
            $adding_info_query = $mysqli->query($add_q);
          }
          else {
            $add_q = "INSERT INTO product_features (feature, value, product_id, lid) VALUES ('" . $item['name'] . "', '" . $item['value'] . "', '" . $pid . "', '1')";
            $adding_info_query = $mysqli->query($add_q);

            $add_q = "INSERT INTO product_features (feature, value, product_id, lid) VALUES ('" . $item['name'] . "', '" . $item['value'] . "', '" . $tid . "', '2')";
            $adding_info_query = $mysqli->query($add_q);
          }
        }
      }
    }

    //галерея изображений
    if (isset($_FILES)) {
      if (isset($_FILES['prod_image'])) {
        foreach ($_FILES['prod_image']['name'] as $name => $item) {
          if ($_FILES['prod_image']['size'][$name] > 0) {
            $uploaddir = IMG_PROJ_PATH . 'products/' . $dirname . '/';
            if (!is_dir($uploaddir)) {
              mkdir($uploaddir, 0744);
            }

            $img_name = stringConvertion(basename($_FILES['prod_image']['name'][$name]));

            $uploadfile = $uploaddir . $img_name;
            if ($_FILES['prod_image']['size'][$name] <= $_POST['MAX_FILE_SIZE']) {
              if (move_uploaded_file($_FILES['prod_image']['tmp_name'][$name], $uploadfile)) {
                $result['info'][] = 'Image uploaded successfully.';
              }

              if ($lang == 2) {
                $add_mi = 'INSERT INTO images (path, prod_id, eng_prod_id) VALUES ("products/' . $dirname . '/' . $img_name . '", "' . $tid . '", "' . $pid . '")';
                $adding_miq = $mysqli->query($add_mi);
              }
              else {
                $add_mi = 'INSERT INTO images (path, prod_id, eng_prod_id) VALUES ("products/' . $dirname . '/' . $img_name . '", "' . $pid . '", "' . $tid . '")';
                $adding_miq = $mysqli->query($add_mi);
              }
            }
            else {
              $result['info'][] = 'Image is too large.';
            }
          }
        }
      }
    }

    //цвета
    if (isset($_POST['farb'])) {
      foreach ($_POST['farb'] as $item) {
        $add_mi = 'INSERT INTO products_colours (product_id, colour_id) VALUES ("' . $pid . '", "' . $item . '")';
        $adding_info_query = $mysqli->query($add_mi);

        $add_mi = 'INSERT INTO products_colours (product_id, colour_id) VALUES ("' . $tid . '", "' . $item . '")';
        $adding_info_query = $mysqli->query($add_mi);
      }
    }

    //размеры
    if (isset($_POST['prod_sizes_field'])) {
      //$sizes_num = count($_POST['prod_sizes_field']);
      $sizes_num = 1;
      $sizes_height = 360;

      if(count($_POST['prod_sizes_field']) > 4) {
        $sizes_height = 480;
      }

      $size_markup = '<div class="rectangle-wrapper" style="height: '.$sizes_height.'px">';
      foreach ($_POST['prod_sizes_field'] as $item) {

        if (isset($item['einbauhohe'])) {
          $eibauh = $item['einbauhohe'];
        }
        else {
          $einbauh = NULL;
        }

        $size_markup .= '<div id="row' . $sizes_num . '" class="rectangle" style="width:' . $item['w'] / 4 . 'px;height:' . $item['h'] / 4 . 'px;bottom:' . $item['bottom'] / 4 . 'px;left:' . $item['left'] / 4 . 'px;">' . $item['w'] . 'x' . $item['h'] . '</div>';
        $sizes_num += 1;

        $add_mi = 'INSERT INTO sizes' .
          ' (modell, sizex, sizey, sizez, raumgrose, leistung, gewicht, category_size_id, einbauhohe, lid) ' .
          'VALUES ' .
          '("' . $item['model'] . '", "' . $item['w'] . '", "' . $item['h'] . '", "' . $item['l'] . '", "' . $item['raumgrosse'] . '", "' . $item['leistung'] . '", "' . $item['gewicht'] . '", "' . $dirname . '", "' . $einbauh . '", "1")';
        $adding_info_query = $mysqli->query($add_mi);

        $add_mi = 'INSERT INTO sizes' .
          ' (modell, sizex, sizey, sizez, raumgrose, leistung, gewicht, category_size_id, einbauhohe, lid) ' .
          'VALUES ' .
          '("' . $item['model'] . '", "' . $item['w'] . '", "' . $item['h'] . '", "' . $item['l'] . '", "' . $item['raumgrosse'] . '", "' . $item['leistung'] . '", "' . $item['gewicht'] . '", "' . $dirname . '", "' . $einbauh . '", "2")';
        $adding_info_query = $mysqli->query($add_mi);
      }


      $size_markup .= '</div>';

      $add_mi = "UPDATE products SET size_markup = '" . $size_markup . "' WHERE id=" . $pid;
      $adding_miq = $mysqli->query($add_mi);

      $add_mi = "UPDATE products SET size_markup = '" . $size_markup . "' WHERE id=" . $tid;
      $adding_miq = $mysqli->query($add_mi);

    }

    $res = TRUE;
    return $res;
  }

  public function delete_data() {
    include 'application/connection.php';

    $res = 1;

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';
    include 'application/menu.php';
    include 'application/string_convertion.php';
    $menu = menu();

    $lang = getLanguage();
    $res['menu'] = $menu;
    $res['type'] = 'prod';

    $name = NULL;
    $ord = NULL;

    if (isset($_POST['name']) && isset($_POST['ord'])) {
      $title = $_POST['name'];
      $ord = $_POST['ord'];
      $pid = $_POST['id'];
      $name = stringConvertion($_POST['name']);

      //берем старое имя папки чтобы переименовать
      $query = "SELECT name FROM products  WHERE id='" . $pid . "'";
      $n_img = $mysqli->query($query);
      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $pn = $r;
        }
      }
      $old_name = $pn['name'];

      if ($lang == 1) {
        rename($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $old_name, $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $name);
      }

      //берем название перевода
      $tname = '';
      if ($lang == '2') {
        $query = "SELECT de FROM page_alias  WHERE en='" . $old_name . "'";
        $t_name = $mysqli->query($query);
        if ($t_name) {
          while ($r = mysqli_fetch_assoc($t_name)) {
            $tname = $r;
          }
        }
        $tname = $tname['de'];
      }
      else {
        $query = "SELECT en FROM page_alias  WHERE de='" . $old_name . "'";
        $t_name = $mysqli->query($query);
        if ($t_name) {
          while ($r = mysqli_fetch_assoc($t_name)) {
            $tname = $r;
          }
        }
        $tname = $tname['en'];
      }

      if ($lang == '2') {
        $query = "SELECT id FROM products  WHERE name='" . $tname . "' AND lid='1'";
      }
      else {
        $query = "SELECT id FROM products  WHERE name='" . $tname . "' AND lid='2'";
      }

      $t_idq = $mysqli->query($query);
      if ($t_idq) {
        while ($r = mysqli_fetch_assoc($t_idq)) {
          $t_id = $r;
        }
      }
      $t_id = $t_id['id'];


      //запрос для обновления данных
      $add_mi = 'UPDATE products SET ord = ' . $ord . ', title = "' . $title . '", name = "' . $name . '",  category_size_id = "' . $name . '"   WHERE id = ' . $pid;
      $adding_miq = $mysqli->query($add_mi);

      //берем все о всех категориях
      $query = $mysqli->query("SELECT * FROM categories ");
      if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
          $res['categories'][] = $r;
        }
      }

      //заменить алиас
      if ($lang == '2') {
        $query = "UPDATE page_alias SET en = '" . $name . "' WHERE en = '" . $old_name . "'";
      }
      else {
        $query = "UPDATE page_alias SET de = '" . $name . "' WHERE de = '" . $old_name . "'";
      }
      $adding_miq = $mysqli->query($query);

      // переименование путей изображений галереи, но если это немецкий
      if ($lang == '1') {
        $query = "SELECT * FROM images WHERE prod_id='" . $pid . "' OR prod_id='" . $t_id . "'";
        $pimage = $mysqli->query($query);

        if ($pimage) {
          while ($r = mysqli_fetch_assoc($pimage)) {
            $oin = $r;

            $old_image_name = $oin['path'];
            $exploded = explode('/', $old_image_name);
            $main_filename = end($exploded);

            $query = 'UPDATE images SET path="products/' . $name . '/' . $main_filename . '"   WHERE id="' . $oin['id'] . '"';
            $n_img = $mysqli->query($query);
          }
        }
      }

//ord start
      $product_name = $name;
      $query = $mysqli->query(
        "SELECT id, name, ord FROM products  WHERE parent_id='" . $_POST['parent_id'] .
        "' AND lid='".$lang."' UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $_POST['parent_id'] .
        "' AND lid='".$lang."'  UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $_POST['parent_id'] .
        "' AND lid='".$lang."'  UNION SELECT id, name, ord FROM bildmotive_catalog  WHERE parent_id='" . $_POST['parent_id'] .
        "' AND lid='".$lang."'  ORDER BY ord"
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
        $q_p = "SELECT id FROM products  WHERE name='" . $it['name'] . "' AND lid='".$lang."'";
        $q_c = "SELECT id FROM categories  WHERE name='" . $it['name'] . "' AND lid='".$lang."'";
        $q_t = "SELECT id FROM thermostat  WHERE name='" . $it['name'] . "' AND lid='".$lang."'";
        $q_b = "SELECT id FROM bildmotive_catalog  WHERE name='" . $it['name'] . "' AND lid='".$lang."'";

        $qq_p = $mysqli->query($q_p);
        $qq_c = $mysqli->query($q_c);
        $qq_t = $mysqli->query($q_t);
        $qq_b = $mysqli->query($q_b);

        if ($qq_p->num_rows !== 0) {
          $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
          $adding_mi = $mysqli->query($add_mi);
        }
        else {
          if ($qq_c->num_rows !== 0) {
            $add_mi = 'UPDATE categories SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
            $adding_mi = $mysqli->query($add_mi);
          }
          else {
            if ($qq_t->num_rows !== 0) {
              $add_mi = 'UPDATE thermostat SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
              $adding_mi = $mysqli->query($add_mi);
            }
            else {
              if ($qq_t->num_rows !== 0) {
                $add_mi = 'UPDATE bildmotive_catalog SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
                $adding_mi = $mysqli->query($add_mi);
              }
              else {
                $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '" AND lid="'.$lang.'"';
                $adding_mi = $mysqli->query($add_mi);
              }
            }
          }
        }
        $fin_ind += 10;
      }
//ord end

      //parent

      $parent_id = 0;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE products SET parent_id = ' . $parent_id . ' WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }

      if ($parent_id !== '0') {
        //взять имя родителя
        $query = "SELECT name FROM categories WHERE id='" . $parent_id . "'";
        $p_nameq = $mysqli->query($query);
        if ($p_nameq) {
          while ($r = mysqli_fetch_assoc($p_nameq)) {
            $p_name = $r;
          }
        }
        $p_name = $p_name['name'];

        //взять имя аналога родителя
        if ($lang == '2') {
          $query = "SELECT de FROM page_alias WHERE en='" . $p_name . "'";
          $parent_t_q = $mysqli->query($query);
          if ($parent_t_q) {
            while ($r = mysqli_fetch_assoc($parent_t_q)) {
              $parent_t_name = $r;
            }
            $parent_t_name = $parent_t_name['de'];
          }

        }
        else {
          $query = "SELECT en FROM page_alias WHERE de='" . $p_name . "'";
          $parent_t_q = $mysqli->query($query);
          if ($parent_t_q) {
            while ($r = mysqli_fetch_assoc($parent_t_q)) {
              $parent_t_name = $r;
            }
          }
          $parent_t_name = $parent_t_name['en'];
        }

        //айди аналога родителя
        if ($lang == '2') {
          $query = "SELECT id FROM categories WHERE name='" . $parent_t_name . "' AND lid='1'";
        }
        else {
          $query = "SELECT id FROM categories WHERE name='" . $parent_t_name . "' AND lid='2'";
        }

        $parent_t_q = $mysqli->query($query);
        if ($parent_t_q) {
          while ($r = mysqli_fetch_assoc($parent_t_q)) {
            $parent_t_id = $r;
          }
        }
        $parent_t_id = $parent_t_id['id'];
      }
      else {
        $parent_t_id = 0;
      }
      //аналогу - аналог родителя
      $add_mi = 'UPDATE products SET parent_id = ' . $parent_t_id . ' WHERE id=' . $t_id;
      $adding_miq = $mysqli->query($add_mi);


      //загрузка главного изображения
      $dirname = $name;
      if (isset($_FILES)) {
        if ($_FILES['prod_main_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0744);
          }

          $img_name = stringConvertion(basename($_FILES['prod_main_image']['name']));

          $uploadfile = $uploaddir . $img_name;
          if ($_FILES['prod_main_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['prod_main_image']['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }


            $add_mi = 'UPDATE products SET image = "products/' . $name . '/' . $img_name . '" WHERE id=' . $pid;
            $adding_miq = $mysqli->query($add_mi);


            $add_mi = 'UPDATE products SET image = "products/' . $name . '/' . $img_name . '" WHERE id=' . $t_id;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }

        }
      }

      //берем путь главного изображения чтобы переименовать
      if ($lang == '1') {
        $query = "SELECT image FROM products  WHERE id='" . $pid . "'";
        $n_img = $mysqli->query($query);
        if ($n_img) {
          while ($r = mysqli_fetch_assoc($n_img)) {
            $oin = $r;
          }
        }
        $old_image_name = $oin['image'];

        $oi_name = explode("/", $old_image_name);
        $old_image_name = end($oi_name);

        $add_mi = 'UPDATE products SET image = "products/' . $name . '/' . $old_image_name . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }

      //description
      $description = NULL;
      if (isset($_POST['description-textarea'])) {
        $description = $_POST['description-textarea'];
        $add_mi = 'UPDATE products SET description = "' . $description . '" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);
      }

      //есть ли термостат
      $optional_thermostat = NULL;
      if (isset($_POST['optional-thermostat'])) {
        $add_mi = 'UPDATE products SET has_thermostat = "1" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);

        $add_mi = 'UPDATE products SET has_thermostat = "1" WHERE id=' . $t_id;
        $adding_miq = $mysqli->query($add_mi);
      }
      else {
        $add_mi = 'UPDATE products SET has_thermostat = "0" WHERE id=' . $pid;
        $adding_miq = $mysqli->query($add_mi);

        $add_mi = 'UPDATE products SET has_thermostat = "0" WHERE id=' . $t_id;
        $adding_miq = $mysqli->query($add_mi);
      }

      //принципы

      $principle = 0;
      $t_principle = 0;
      if (isset($_POST['principle'])) {
      if ($lang == 2) {

          if ($_POST['principle'] == 4) {
            $principle = 4;
            $t_principle = 1;
          }
          else {
            if ($_POST['principle'] == 5) {
              $principle = 5;
              $t_principle = 2;
            }
            else {
              if ($_POST['principle'] == 6) {
                $principle = 6;
                $t_principle = 3;
              }
            }
          }
        }
        else {
          if ($_POST['principle'] == 1) {
            $principle = 1;
            $t_principle = 4;
          }
          else {
            if ($_POST['principle'] == 2) {
              $principle = 2;
              $t_principle = 5;
            }
            else {
              if ($_POST['principle'] == 3) {
                $principle = 3;
                $t_principle = 6;
              }
            }
          }
        }
      }

      $add_mi = 'UPDATE products SET principle = "' . $principle . '" WHERE id=' . $pid;
      $adding_miq = $mysqli->query($add_mi);

      $add_mi = 'UPDATE products SET principle = "' . $t_principle . '" WHERE id=' . $t_id;
      $adding_miq = $mysqli->query($add_mi);


      //потолочный ли
      $is_decken = NULL;
      if (isset($_POST['is-decken'])) {
        $add_mi = 'UPDATE products SET has_height = "1" WHERE id="' . $pid . '" OR id="' . $t_id . '"';
        $adding_miq = $mysqli->query($add_mi);
      }
      else {
        $add_mi = 'UPDATE products SET has_height = "0" WHERE id="' . $pid . '" OR id="' . $t_id . '"';
        $adding_miq = $mysqli->query($add_mi);
      }
    }

    //убираем все фичи, чтобы перезаписать их заново
    $query = "SELECT * FROM `product_features`  WHERE `product_id`='" . $pid . "'";
    $n_img = $mysqli->query($query);
    if ($n_img) {
      while ($r = mysqli_fetch_assoc($n_img)) {
        $del_p = "DELETE FROM `product_features` WHERE `id`='" . $r['id'] . "' ";
        $adding_miq = $mysqli->query($del_p);
      }
    }


    if (isset($_POST['prod_feature'])) {
      foreach ($_POST['prod_feature'] as $item) {
        if (isset($item['name']) and isset($item['value']) and $item['name'] !== '') {
          $add_q = "INSERT INTO product_features (feature, value, product_id) VALUES ('" . $item['name'] . "', '" . $item['value'] . "', '" . $pid . "')";
          $adding_info_query = $mysqli->query($add_q);
        }
      }
    }


    //загрузка изображений галерейки
    if (isset($_FILES)) {
      if (isset($_FILES['prod_image'])) {
        foreach ($_FILES['prod_image']['name'] as $name => $item) {
          if ($_FILES['prod_image']['size'][$name] > 0) {
            if ($lang == '1') {
              $dir = $dirname;
            }
            else {
              $dir = $tname;
            }
            $uploaddir = IMG_PROJ_PATH . 'products/' . $dir . '/';
            if (!is_dir($uploaddir)) {
              mkdir($uploaddir, 0744);
            }
            $img_name = stringConvertion(basename($_FILES['prod_image']['name'][$name]));

            $uploadfile = $uploaddir . $img_name;
            if ($_FILES['prod_image']['size'][$name] <= $_POST['MAX_FILE_SIZE']) {
              if (move_uploaded_file($_FILES['prod_image']['tmp_name'][$name], $uploadfile)) {
                $result['info'][] = 'Image uploaded successfully.';
              }

              if ($lang == '2') {
                $add_mi = 'INSERT INTO images (path, prod_id, eng_prod_id) VALUES ("products/' . $dir . '/' . $img_name . '", "' . $t_id . '", "' . $pid . '")';
              }
              else {
                $add_mi = 'INSERT INTO images (path, prod_id, eng_prod_id) VALUES ("products/' . $dir . '/' . $img_name . '", "' . $pid . '", "' . $t_id . '")';
              }

              $adding_miq = $mysqli->query($add_mi);

            }
            else {
              $result['info'][] = 'Image is too large.';
            }
          }
        }
      }
    }


    $query = "SELECT * FROM `products_colours`  WHERE `product_id`='" . $pid . "' OR `product_id`='" . $t_id . "'";
    $n_img = $mysqli->query($query);
    if ($n_img) {
      while ($r = mysqli_fetch_assoc($n_img)) {
        $del_p = "DELETE FROM `products_colours` WHERE `id`='" . $r['id'] . "'";
        $adding_miq = $mysqli->query($del_p);
      }
    }
    //перезагрузка цветов

    if (isset($_POST['farb'])) {
      foreach ($_POST['farb'] as $item) {
        $add_mi = 'INSERT INTO products_colours (product_id, colour_id) VALUES ("' . $pid . '", "' . $item . '")';
        $adding_info_query = $mysqli->query($add_mi);

        $add_mi = 'INSERT INTO products_colours (product_id, colour_id) VALUES ("' . $t_id . '", "' . $item . '")';
        $adding_info_query = $mysqli->query($add_mi);
      }
    }

    //перезагрузка размеров

    $query = "SELECT * FROM `sizes`  WHERE `category_size_id`='" . $old_name . "'";
    $n_img = $mysqli->query($query);
    if ($n_img) {
      while ($r = mysqli_fetch_assoc($n_img)) {
        $del_p = "DELETE FROM `sizes` WHERE `id`='" . $r['id'] . "' AND lid='".$lang."'";
        $adding_miq = $mysqli->query($del_p);
      }
    }

    if (isset($_POST['prod_sizes_field'])) {
      //$sizes_num = count($_POST['prod_sizes_field']);
      $sizes_num = 1;
      $sizes_height = 360;
      if(count($_POST['prod_sizes_field']) > 4) {
        $sizes_height = 480;
      }

      $size_markup = '<div class="rectangle-wrapper" style="height: '.$sizes_height.'px">';
      foreach ($_POST['prod_sizes_field'] as $item) {
        if ($item['model'] !== '') {
          $size_markup .= '<div id="row' . $sizes_num . '" class="rectangle" style="width:' . $item['w'] / 4 . 'px;height:' . $item['h'] / 4 . 'px;bottom:' . $item['bottom'] / 4 . 'px;left:' . $item['left'] / 4 . 'px;">' . $item['w'] . 'x' . $item['h'] . '</div>';
          $sizes_num += 1;

          if ($lang == 2) {
            $lid_curr = 2;
            $lid_t = 1;
          }
          else {
            $lid_curr = 1;
            $lid_t = 2;
          }

          if (isset($item['einbauhohe'])) {
            $einbauh = $item['einbauhohe'];
          }
          else {
            $einbauh = NULL;
          }

          $add_mi = 'INSERT INTO sizes' .
            ' (modell, sizex, sizey, sizez, raumgrose, leistung, gewicht, category_size_id, einbauhohe, lid, bottom, `left`) ' .
            'VALUES ' .
            '("' . $item['model'] . '", "' . $item['w'] . '", "' . $item['h'] . '", "' . $item['l'] . '", "' . $item['raumgrosse'] . '", "' . $item['leistung'] . '", "' . $item['gewicht'] . '", "' . $dirname . '", "' . $einbauh . '", "' . $lang . '", "' . $item['bottom'] . '", "' . $item['left'] . '")';
          $adding_info_query = $mysqli->query($add_mi);
        }
      }

      $size_markup .= '</div>';

      $add_mi = "UPDATE products SET size_markup = '" . $size_markup . "' WHERE id=" . $pid;
      $adding_miq = $mysqli->query($add_mi);


    }

    //поудалять изображения из галереи
    if (isset($_POST['del-image'])) {
      foreach ($_POST['del-image'] as $row) {
        $query = "SELECT path FROM images  WHERE id='" . $row . "' ";
        $del_img = $mysqli->query($query);

        if ($del_img) {
          while ($r = mysqli_fetch_assoc($del_img)) {
            $cid = $r;
          }
        }

        $delpath = IMAGEPATH . 'products/' . $dirname . $cid['path'];
        if (is_file($delpath)) {
          unlink($delpath);
        }

        $query = "DELETE FROM images  WHERE id='" . $row . "'";
        $del_img = $mysqli->query($query);
      }
    }

    //берем имя папки в названии главного изображения чтобы переименовать
    if ($lang == 1) {
      $query = "SELECT image FROM products  WHERE id='" . $pid . "'";
      $n_img = $mysqli->query($query);
      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $oin = $r;
        }
      }
      $old_image_name = $oin['image'];
      $exploded = explode('/', $old_image_name);
      $main_filename = end($exploded);
      $tmpp = "products/' . $product_name . '/' . $main_filename . '";
      $add_mi = 'UPDATE products SET image = "products/' . $product_name . '/' . $main_filename . '" WHERE id="' . $pid . '" OR id="' . $t_id . '"';
      $adding_miq = $mysqli->query($add_mi);
    }


    $res = TRUE;
    return $res;
  }
}
