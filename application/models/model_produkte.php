<?php

class Model_Unsere_produkte extends Model {
  public function get_data() {
    include 'application/connection.php';
    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $last = end($routes);
    $lang = getLanguage();
    //берем из урла последний элемент - имя каталога
    $routes_count = count($routes);
    if ($last == "edit") {
      $last = $routes[$routes_count - 2];
    }

    //по выбранному имени берем из базы айди
    if (!empty($routes[2])) {
      $row = mysqli_fetch_assoc($mysqli->query("SELECT id FROM categories WHERE name LIKE '%" . $last . "%' AND lid='" . $lang . "'"));
      $id = $row['id'];
    }
    else {
      $id = 0;
    }

    //берем из базы инфу
    $res = [];
    $query = $mysqli->query("SELECT * FROM categories  WHERE name='" . $last . "' AND lid='" . $lang . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['main'] = $r;
      }
    }

    //берем всех потомков директории
    $query = $mysqli->query(
      "SELECT name, image, title, short_description, ord FROM products  WHERE parent_id=" . $id .
      " AND lid=" . $lang . "  UNION SELECT name, image, title, short_description, ord FROM  categories  WHERE parent_id=" . $id .
      " AND lid=" . $lang . "  UNION SELECT name, image, title, short_description, ord FROM thermostat  WHERE parent_id=" . $id .
      " AND lid=" . $lang . "  UNION SELECT name, image, title, short_description, ord FROM bildmotive_catalog  WHERE parent_id=" . $id .
      " AND lid=" . $lang . "  ORDER BY ord"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items_show'][] = $r;
      }
    }

    //берем все категории
    $query = $mysqli->query("SELECT * FROM categories ");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    //берем все что на поточном языке
    $query = $mysqli->query(
      "SELECT id, title, ord, parent_id FROM products  " .
      " WHERE lid=" . $lang . "  UNION SELECT id, title, ord, parent_id FROM  categories " .
      " WHERE lid=" . $lang . "  UNION SELECT id, title, ord, parent_id FROM thermostat  " .
      " WHERE lid=" . $lang . "  UNION SELECT id, title, ord, parent_id FROM bildmotive_catalog  " .
      " WHERE lid=" . $lang . "  ORDER BY ord"
    );
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['items'][] = $r;
      }
    }

    //если не корневой каталог -
    if ($last !== 'produkte' && $last !== 'products') {
      include_once 'application/menu.php';
      $menu = menu();
      $res['menu'] = $menu;
      $res['type'] = 'prod';
    }

    return $res;
  }

  public function add_data() {
    include 'application/connection.php';

    //все категории
    $res = [];
    $query = $mysqli->query("SELECT * FROM categories ");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    //формируем меню
    include 'application/menu.php';
    $menu = menu();
    $res['menu'] = $menu;


    //все потомки (уже без галереи)
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

  //сохранение после создания
  public function save_data() {
    include 'application/connection.php';
    include 'application/string_convertion.php';

    $lang = getLanguage();
    $id = NULL;
    //если пост не пустой - в нем будет порядковый номер
    if (isset($_POST['id'])) {
      $id = $_POST['id'];


      //добавляем айдишник в таблицу с категориями
      $add_mi = 'INSERT INTO categories (ord, lid) VALUES ("' . $id . '", "' . $lang . '")';
      $adding_miq = $mysqli->query($add_mi);

      if ($lang == 2) {
        $add_mi = 'INSERT INTO categories (ord, lid) VALUES ("' . $id . '", "1")';
      }
      else {
        $add_mi = 'INSERT INTO categories (ord, lid) VALUES ("' . $id . '", "2")';
      }
      $adding_miq = $mysqli->query($add_mi);

      //если имя не пустое
      $name = NULL;
      if (isset($_POST['name'])) {
        //заглавие запишем большими буквами
        $title = strtoupper($_POST['name']);

        //записываем в базу заглавие
        $add_mi = 'UPDATE categories SET title = "' . $title . '" WHERE ord=' . $id;
        $adding_miq = $mysqli->query($add_mi);

        //переделаем имя
        $name = stringConvertion($title);

        //запишем имя
        $add_mi = 'UPDATE categories SET name = "' . $name . '" WHERE ord=' . $id;
        $adding_miq = $mysqli->query($add_mi);

        //запись в алиасы

        $add_mi = 'INSERT INTO page_alias (en, de) VALUES ("' . $name . '", "' . $name . '")';
        $adding_miq = $mysqli->query($add_mi);
      }

      //берем айдишник родителя и пишем
      $parent_id = NULL;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE categories SET parent_id = "' . $parent_id . '" WHERE ord=' . $id;
        $adding_miq = $mysqli->query($add_mi);
      }

      //выбрать айдишник
      $img_q = "SELECT id FROM categories  WHERE name='" . $name . "'";
      $query = $mysqli->query($img_q);

      if ($query) {
        $r = mysqli_fetch_assoc($query);
        $cid = $r;
      }

      $cid = $cid['id'];

      //выбираем все соседние элементы


      //////установка порядка
      $query = $mysqli->query(
        "SELECT id, name, ord FROM products  WHERE parent_id='" . $parent_id .
        "' AND lid='".$lang."' UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $parent_id .
        "' AND lid='".$lang."'  UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $parent_id .
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
        $q_p = "SELECT id FROM products  WHERE name='" . $it['name'] . "' AND lid='".$lang."'";
        $q_c = "SELECT id FROM categories  WHERE name='" . $it['name'] . "' AND lid='".$lang."'";
        $q_t = "SELECT id FROM thermostat  WHERE name='" . $it['name'] . "' AND lid='".$lang."'";

        $qq_p = $mysqli->query($q_p);
        $qq_c = $mysqli->query($q_c);
        $qq_t = $mysqli->query($q_t);

        if ($qq_p->num_rows !== 0) {
          $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"  AND lid="'.$lang.'"';
          $adding_mi = $mysqli->query($add_mi);
        }
        else {
          if ($qq_c->num_rows !== 0) {
            $add_mi = 'UPDATE categories SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"  AND lid="'.$lang.'"';
            $adding_mi = $mysqli->query($add_mi);
          }
          else {
            if ($qq_t->num_rows !== 0) {
              $add_mi = 'UPDATE thermostat SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"  AND lid="'.$lang.'"';
              $adding_mi = $mysqli->query($add_mi);
            }
            else {
              $add_mi = 'UPDATE products SET ord = "' . $fin_ind . '" WHERE name="' . $it['name'] . '"  AND lid="'.$lang.'"';
              $adding_mi = $mysqli->query($add_mi);
            }
          }
        }
        $fin_ind += 10;
      }

      ////////////////
      //загрузка изображения
      if (isset($_FILES)) {
        if ($_FILES['category_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0777);
          }

          $img_name = stringConvertion(basename($_FILES['category_image']['name']));

          $uploadfile = $uploaddir . $img_name;
          if ($_FILES['category_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $img_name . '" WHERE name="' . $name . '"';
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
    include 'application/removedir.php';

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
    $lang = getLanguage();
    $route_len = count($routes);

    //имя удаляемой категории
    $curr_name = $routes[$route_len - 2];

    //$query = "DELETE FROM `page_alias` WHERE en='" . $curr_name . "' OR de='" . $curr_name . "'";
    //$del_al = $mysqli->query($query);

    $q_p = "SELECT id FROM products  WHERE name='" . $curr_name . "'";
    $q_c = "SELECT id FROM categories  WHERE name='" . $curr_name . "'";
    $q_t = "SELECT id FROM thermostat  WHERE name='" . $curr_name . "'";

    $qq_p = $mysqli->query($q_p);
    $qq_c = $mysqli->query($q_c);
    $qq_t = $mysqli->query($q_t);

//если это продукт
    if ($qq_p->num_rows !== 0) {

      if ($qq_p) {
        while ($r = mysqli_fetch_assoc($qq_p)) {
          $id = $r['id'];
        }
      }

      //перевод продукта
      if ($lang == 2) {
        $query = "SELECT de FROM page_alias WHERE en='" . $curr_name . "'";
        $adding_mi = $mysqli->query($query);

        if ($adding_mi) {
          while ($r = mysqli_fetch_assoc($adding_mi)) {
            $t_name = $r['de'];
          }
        }


      }
      else {
        $query = "SELECT en FROM page_alias WHERE de='" . $curr_name . "'";
        $adding_mi = $mysqli->query($query);

        if ($adding_mi) {
          while ($r = mysqli_fetch_assoc($adding_mi)) {
            $t_name = $r['en'];
          }
        }
      }

      //id перевода
      $q_tr = "SELECT id FROM products  WHERE name='" . $t_name . "' AND lid='" . $lang . "'";
      $adding_mi = $mysqli->query($q_tr);
      if ($adding_mi) {
        while ($r = mysqli_fetch_assoc($adding_mi)) {
          $t_id = $r['id'];
        }
      }

      //взять изображение продукта
      $query = "SELECT image FROM `products` WHERE name='" . $curr_name . "'";
      $adding_mi = $mysqli->query($query);

      if ($adding_mi) {
        while ($r = mysqli_fetch_assoc($adding_mi)) {
          $image = $r['image'];
        }
      }

      //удалить изображение продукта
      if ($r !== NULL) {
        $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['image'];
        unlink($img_path);
      }

      //Gallery images
      if($lang == '2') {
        $query = "SELECT path FROM `images` WHERE prod_id='" . $t_id . "' OR eng_prod_id='".$id."'";
      } else {
        $query = "SELECT path FROM `images` WHERE prod_id='" . $id . "' OR eng_prod_id='".$t_id."'";
      }

      $adding_mi = $mysqli->query($query);

      //поудалять изображения продукта
      if ($adding_mi) {
        while ($r = mysqli_fetch_assoc($adding_mi)) {
          $image = $r['path'];
          $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['path'];
          unlink($img_path);
        }
      }


      if ($lang == '2') {
        //и удалить каталог продукта
        if (is_dir($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $t_name)) {
          removeDirectory($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $t_name);
        }
      }
      else {
        //и удалить каталог продукта
        if (is_dir($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $curr_name)) {
          removeDirectory($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $curr_name);
        }
      }


      //поудалять все свойства
      $query = "DELETE FROM `product_features` WHERE product_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);

      $query = "DELETE FROM `product_features` WHERE product_id='" . $t_id . "'";
      $adding_mi = $mysqli->query($query);


      //поудалять все цвета продукта
      $query = "DELETE FROM `products_colours` WHERE product_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);

      $query = "DELETE FROM `products_colours` WHERE product_id='" . $t_id . "'";
      $adding_mi = $mysqli->query($query);

      //поудалять все размеры
      $query = "DELETE FROM `sizes` WHERE category_size_id='" . $curr_name . "'";
      $adding_mi = $mysqli->query($query);

      $query = "DELETE FROM `sizes` WHERE category_size_id='" . $t_name . "'";
      $adding_mi = $mysqli->query($query);

      //поудалять все картинки
      if($lang==2) {
        $query = "DELETE FROM `images` WHERE eng_prod_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);

      $query = "DELETE FROM `images` WHERE prod_id='" . $t_id . "'";
      $adding_mi = $mysqli->query($query);
      } else {
        $query = "DELETE FROM `images` WHERE prod_id='" . $id . "'";
      $adding_mi = $mysqli->query($query);

      $query = "DELETE FROM `images` WHERE eng_prod_id='" . $t_id . "'";
      $adding_mi = $mysqli->query($query);
      }



      //и удалить запись о продукте
      $query = "DELETE FROM `products` WHERE name='" . $curr_name . "'";
      $adding_mi = $mysqli->query($query);

      $query = "DELETE FROM `products` WHERE name='" . $t_name . "'";
      $adding_mi = $mysqli->query($query);

      if($lang == '2') {
        $query = "DELETE FROM `page_alias` WHERE en='" . $curr_name . "'";
      } else {
        $query = "DELETE FROM `page_alias` WHERE de='" . $curr_name . "'";
      }

      $adding_mi = $mysqli->query($query);


    }
    else {
      //если это каталог
      if ($qq_c->num_rows !== 0) {
        //взять айдишник каталога
        if ($qq_c) {
          while ($r = mysqli_fetch_assoc($qq_c)) {
            $id = $r['id'];
          }
        }

        //берем изображение каталога
        $query = "SELECT image FROM `categories` WHERE id='" . $id . "'";
        $adding_mi = $mysqli->query($query);

        //удаляем изображение и папку
        if ($adding_mi) {
          while ($r = mysqli_fetch_assoc($adding_mi)) {
            $image = $r['image'];
            $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['image'];
            if ($r['image'] !== '') {
              unlink($img_path);
            }

          }
        }
        if ($lang == '2') {
          $dname_query = 'SELECT de FROM page_alias WHERE en="' . $curr_name . '"';
          $adding_mi = mysqli_fetch_assoc($mysqli->query($dname_query));
          $dname = $adding_mi['de'];
        }
        else {
          $dname = $curr_name;
        }
        removeDirectory($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $dname);


        //удалить запись о категории
        if ($lang == '2') {
          $dname_query = 'SELECT de FROM page_alias WHERE en="' . $curr_name . '"';
          $adding_mi = mysqli_fetch_assoc($mysqli->query($dname_query));
          $dname = $adding_mi['de'];
        }
        else {
          $ename_query = 'SELECT en FROM page_alias WHERE de="' . $curr_name . '"';
          $adding_mi = mysqli_fetch_assoc($mysqli->query($ename_query));
          $ename = $adding_mi['en'];
        }

        $query = "DELETE FROM `categories` WHERE name='" . $curr_name . "'";
        $adding_mi = $mysqli->query($query);

        $query = "DELETE FROM `categories` WHERE name='" . $ename . "'";
        $adding_mi = $mysqli->query($query);
      }
      else {
        //если это термостат
        if ($qq_t->num_rows !== 0) {

          //берем айдишник
          if ($qq_t) {
            while ($r = mysqli_fetch_assoc($qq_t)) {
              $id = $r['id'];
            }
          }

          //Gallery images удаляем
          $query = "SELECT path FROM `thermostats_images` WHERE prod_id='" . $id . "'";
          $adding_mi = $mysqli->query($query);

          if ($adding_mi) {
            while ($r = mysqli_fetch_assoc($adding_mi)) {
              $image = $r['path'];
              $img_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['path'];
              unlink($img_path);
            }
          }

          //берем главное изображение и удаляем
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
              removeDirectory($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $curr_name);

            }
          }

          //удаляем все свойства
          $query = "DELETE FROM `thermostat_feature` WHERE product_id='" . $id . "'";
          $adding_mi = $mysqli->query($query);

          //удаляем все изображения из базы
          $query = "DELETE FROM `thermostats_images` WHERE prod_id='" . $id . "'";
          $adding_mi = $mysqli->query($query);

          //удаляем саму запись
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
    include_once 'application/string_convertion.php';
    //собираем меню и передаем тип ноды
    $menu = menu();
    $res['menu'] = $menu;
    $res['type'] = 'prod';

    //если форма передалась, т.е. айди и порядковый номер пришли
    $id = NULL;
    if (isset($_POST['id']) && isset($_POST['ord'])) {
      $id = $_POST['id'];
      $ord = $_POST['ord'];

      //меняем порядок категории в таблице
      $add_mi = 'UPDATE categories SET ord = ' . $ord . ' WHERE id = ' . $id;
      $adding_miq = $mysqli->query($add_mi);

      //берем старое имя папки чтобы переименовать
      $query = "SELECT name FROM categories  WHERE id='" . $id . "'";
      $n_img = $mysqli->query($query);
      if ($n_img) {
        $r = mysqli_fetch_assoc($n_img);
        $pn = $r;
      }
      $old_name = $pn['name'];

      $lang = getLanguage();

//берем название аналога, т.е. перевод папки
      if ($lang == 2) {
        $add_mi = 'SELECT de FROM page_alias WHERE en="' . $old_name . '"';
      }
      else {
        $add_mi = 'SELECT en FROM page_alias WHERE de="' . $old_name . '"';
      }
      $n_img = $mysqli->query($add_mi);
      if ($n_img) {
        $r = mysqli_fetch_assoc($n_img);
        $translate = $r;
      }

      //меняем заглавие и имя
      //если задано имя
      $name = NULL;
      if (isset($_POST['name'])) {
        $title = strtoupper($_POST['name']);

        //обновляем заглавие
        $add_mi = 'UPDATE categories SET title = "' . $title . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);

        //преобразовали имя
        $name = stringConvertion($_POST['name']);
        //записали имя в базу
        $add_mi = 'UPDATE categories SET name = "' . $name . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);

        //меняем имя в алиасах в соотв. языке
        if (getLanguage() == 2) {
          $add_mi = 'UPDATE page_alias SET en = "' . $name . '" WHERE en=' . $old_name;
        }
        else {
          $add_mi = 'UPDATE page_alias SET de = "' . $name . '" WHERE de=' . $old_name;
        }

        $adding_miq = $mysqli->query($add_mi);
      }

      //переименование папку если она есть
      if (is_dir($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $old_name) && $old_name !== '') {
        rename($_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $old_name, $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $name);
      }


      //берем имя папки чтобы переименовать (путь к изображению)
      $query = "SELECT image FROM categories  WHERE id='" . $id . "'";
      $n_img = $mysqli->query($query);

      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $oin = $r;
        }
      }

      $old_image_name = $oin['image'];
      $exploded = explode('/', $old_image_name);
      $old_main_filename = end($exploded);
////////////////////
      $main_filename = $_FILES['category_image']['name'];

      $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $main_filename . '" WHERE id=' . $id;
      $adding_miq = $mysqli->query($add_mi);

      ///// //// //// //// ///////// //// //// //// ///////// //// //// //// ///////// //// //// //// ///////// //// //// //// ////
      //в переводе
      //берем имя папки чтобы переименовать (путь к изображению)

      if ($lang == 2) {
        $query = "SELECT image FROM categories  WHERE name='" . $translate['de'] . "'";
      }
      else {
        $query = "SELECT image FROM categories  WHERE name='" . $translate['en'] . "'";
      }

      $n_img = $mysqli->query($query);

      if ($n_img) {
        while ($r = mysqli_fetch_assoc($n_img)) {
          $oin = $r;
        }
      }

      $old_image_name = $oin['image'];
      $exploded = explode('/', $old_image_name);
      $old_main_filename = end($exploded);

      $main_filename = $_FILES['category_image']['name'];

      if ($lang == 2) {
        $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $main_filename . '" WHERE name="' . $translate['de'] . '"';
      }
      else {
        $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $main_filename . '" WHERE name="' . $translate['en'] . '"';
      }

      $adding_miq = $mysqli->query($add_mi);
////////////

      //меняем родительский айдишник
      $parent_id = NULL;
      if (isset($_POST['parent_id'])) {
        $parent_id = $_POST['parent_id'];

        $add_mi = 'UPDATE categories SET parent_id = "' . $parent_id . '" WHERE id=' . $id;
        $adding_miq = $mysqli->query($add_mi);
      }

      ///////////////
      //устанавливаем порядок расположения в папке
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
        "' AND lid='".$lang."'  UNION SELECT id, name, ord FROM  categories WHERE parent_id='" . $parent_id .
        "' AND lid='".$lang."'  UNION SELECT id, name, ord FROM thermostat  WHERE parent_id='" . $parent_id .
        "' AND lid='".$lang."'  UNION SELECT id, name, ord FROM bildmotive_catalog  WHERE parent_id='" . $parent_id .
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
        $q_p = "SELECT id FROM products  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";
        $q_c = "SELECT id FROM categories  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";
        $q_t = "SELECT id FROM thermostat  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";
        $q_b = "SELECT id FROM bildmotive_catalog  WHERE name='" . $it['name'] . "' AND lid='".$lang."' ";

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

      ////////////////
      //загрузка главного изображения
      if (isset($_FILES)) {
        if ($_FILES['category_image']['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'products/' . $name . '/';
          if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0777);
          }

          $img_name = stringConvertion(basename($_FILES['category_image']['name']));

          $uploadfile = $uploaddir . $img_name;
          if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $img_name . '" WHERE id=' . $cid;
          $adding_miq = $mysqli->query($add_mi);

          if ($lang == 2) {
            $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $img_name . '" WHERE name="' . $translate['de'] . '"';
          }
          else {
            $add_mi = 'UPDATE categories SET image = "products/' . $name . '/' . $img_name . '" WHERE name="' . $translate['en'] . '"';
          }

          $adding_miq = $mysqli->query($add_mi);
        }
      }
    }

    if ($lang == 2) {
      $query = "UPDATE page_alias SET en = '" . $name . "' WHERE en = '" . $old_name . "'";
    }
    else {
      $query = "UPDATE page_alias SET de = '" . $name . "' WHERE de = '" . $old_name . "'";
    }

    $adding_miq = $mysqli->query($query);

    $res = TRUE;

    return $res;
  }
}
