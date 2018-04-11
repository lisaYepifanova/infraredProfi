<?php

class Model_Download extends Model {
  public function get_data() {
    include 'application/connection.php';

    $lang = getLanguage();

    $query = $mysqli->query("SELECT * FROM documents  WHERE lid='" . $lang . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['documents'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT id FROM documents");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id'] = max($rr['arr_of_id']);


    $query = $mysqli->query("SELECT id FROM document_categories");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_cat_id'][] = $r['id'];
      }
    }

    $res['max_cat_id'] = max($rr['arr_of_cat_id']);

    $query = $mysqli->query("SELECT * FROM document_categories  WHERE lid='" . $lang . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';
    include 'application/string_convertion.php';

    $lang = getLanguage();

    //названия категорий
    if (isset($_POST['category'])) {
      foreach ($_POST['category'] as $cid => $category_name) {

        //берем старое название категории для переименования каталога с документами
        $category_old_name = '';

        if (isset($_POST['category_old'][$cid])) {
          $category_old_name = $_POST['category_old'][$cid];
        }

        //если новое имя категории не пустое и оно поменялось (не равно старому)
        if ($category_name !== '' and $category_name !== $category_old_name) {

          $query = $mysqli->query("SELECT id FROM document_categories  WHERE id='" . $cid . "'");

          if ($query->num_rows > 0) {
            //обновляем название категории по айдишке
            $add_q = "UPDATE document_categories SET category_name = '" . $category_name . "' WHERE id = '" . $cid . "' ";
          }
          else {
            $add_q = 'INSERT INTO document_categories (id, category_name, lid) VALUES ("' . $cid . '", "' . $category_name . '", "' . $lang . '")';
          }

          $info_query = $mysqli->query($add_q);

          $uploaddir = DOC_PROJ_PATH;

          //преобразовываем имя категории для названия каталога
          $category_name = stringConvertion($category_name);

          //старое имя категории - определить название папки
          $cat_old_name_conv = stringConvertion($category_old_name);

          //путь к старой папке
          $old_dir_name = $uploaddir . $cat_old_name_conv;

          //путь к новой папке
          $new_dir_name = $uploaddir . $category_name;

          //если есть папка со старым именем то переименуем, иначе - создаем новую
          if ($cat_old_name_conv !== '' and is_dir($old_dir_name)) {
            rename($old_dir_name, $new_dir_name);
          }
          else {
            mkdir($new_dir_name, 0777);
          }

          //выбираем доки которые лежат в поточной категории
          $query = $mysqli->query("SELECT * FROM documents  WHERE category='" . $cid . "'");

          //если есть такие доки
          if ($query) {
            //цикл по документам
            while ($r = mysqli_fetch_assoc($query)) {

              $docs[] = $r;

              //путь к документу преобразуем в массив
              $rpath = explode('/', $r['path']);

              //старое название папки
              $c_old_name = $rpath[0];

              //название папки меняем на новое
              $rpath[0] = $category_name;

              //собираем массив в новый путь к файлам
              $new_path = implode("/", $rpath);

              //$new_path = str_replace("$c_old_name", "$category_name", $r['path']);

              //обновляем путь документа
              $upd = "UPDATE documents SET path = '" . $new_path . "' WHERE id = '" . $r['id'] . "' ";
              $info_query = $mysqli->query($upd);
            }
          }
        }
      }
    }


    //все файлы в файловую систему и в базу
    if (isset($_FILES)) {
      //если файлы были загружены
      if (isset($_FILES['doc'])) {

        //ходим по именам файлов
        foreach ($_FILES['doc']['name'] as $id => $item) {
          //если имя файла не пустое
          if ($_FILES['doc']['name'][$id] !== "") {
            $uploaddir = DOC_PROJ_PATH;

            //берем айдишку категории для этого файла
            $cid = $_POST['doc'][$id]['cid'];

            //определяем имя категории
            $category_name = $_POST['category'][$cid];

            //преобразуем имя категории
            $category_name = stringConvertion($category_name);

            //путь к загружаемому файлу
            $uploadfile = $uploaddir . $category_name . '/' . basename($item);

            if (!is_dir(DOC_PROJ_PATH . $category_name)) {
              mkdir(DOC_PROJ_PATH . $category_name, '0767');
            }


            //загружаем файл по указаному пути
            if (move_uploaded_file($_FILES['doc']['tmp_name'][$id], $uploadfile)) {
              $result['info'][] = 'Document uploaded successfully.';
            }

            //определяем имя документа
            $curr_name = NULL;
            if (isset($_POST)) {
              if (isset($_POST['doc'])) {
                if (isset($_POST['doc'][$id]['name'])) {
                  $curr_name = $_POST['doc'][$id]['name'];
                }
              }
            }

            //ищем док в базе
            $path_name = mysqli_fetch_assoc($mysqli->query("SELECT id FROM documents WHERE id='" . $id . "'"));

            //если доки нет, тогда добавляем новую запись о доке
            if ($path_name['id'] == NULL) {
              $add_mi = 'INSERT INTO documents (id, path, name, category, lid) VALUES ("' . $id . '", "' . $category_name . '/' . $item . '", "' . $curr_name . '", "' . $cid . '", "'.$lang.'")';
            }
            else {
              $add_mi = "UPDATE documents " .
                " SET path = '" . $category_name . '/' . $item . "' , name = '" . $curr_name . "', category = '" . $cid . "' " .
                " WHERE id = '" . $id . "' ";
            }

            $adding_miq = $mysqli->query($add_mi);
          }
        }
      }
    }

    //если есть инфа по докам
    if (isset($_POST['doc'])) {

      //ходим по всем докам
      foreach ($_POST['doc'] as $id => $item) {
        //проверяем есть ли файл в базе
        $isFileExist = mysqli_fetch_assoc($mysqli->query('SELECT id FROM documents WHERE id = ' . $id));

        //если есть запись в базе и имя пришло не пустое - обновляем имя документа
        if ($isFileExist['id'] == $id and $item['name'] !== '') {
          $add_q = "UPDATE documents SET name = '" . $item['name'] . "' WHERE id = '" . $id . "' ";
          $info_query = $mysqli->query($add_q);
        }
      }
    }
    $info_query = TRUE;

    if ($info_query) {
      $result['res'] = TRUE;
    }
    else {
      $result['res'] = FALSE;
    }

    return $result;
  }

  public function delete_data($id) {
    include 'application/connection.php';


    if (isset($id)) {
      $del_file = "SELECT path FROM documents WHERE id = " . $id . " ";
      $filename = mysqli_fetch_assoc($mysqli->query($del_file));

      if (file_exists(DOC_PROJ_PATH . $filename['path'])) {
        unlink(DOC_PROJ_PATH . $filename['path']);
      }
      else {
        $result['info'] = "File not exist";
      }

      $del_q = "DELETE FROM documents WHERE id = " . $id . " ";
      $info_query = $mysqli->query($del_q);
    }

    if ($info_query) {
      $result['res'] = TRUE;
    }
    else {
      $result['res'] = FALSE;
    }

    return $result;
  }
}
