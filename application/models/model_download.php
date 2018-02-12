<?php

class Model_Download extends Model {
  public function get_data() {
    include 'application/connection.php';
    $query = $mysqli->query("SELECT * FROM documents");

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

    $query = $mysqli->query("SELECT * FROM document_categories");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['categories'][] = $r;
      }
    }

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';

    //названия категорий
    if (isset($_POST['category'])) {
      foreach ($_POST['category'] as $cid => $category_name) {
        if ($category_name != '') {
          $add_q = "UPDATE document_categories SET category_name = '" . $category_name . "' WHERE id = '" . $cid . "' ";
          $info_query = $mysqli->query($add_q);
        }
      }
    }

    //все файлы в файловую систему и в базу
    if (isset($_FILES)) {
      if (isset($_FILES['doc'])) {
        foreach ($_FILES['doc']['name'] as $id => $item) {
          if ($_FILES['doc']['name'][$id] !== "") {
            $uploaddir = DOC_PROJ_PATH;


            $cid = $_POST['doc'][$id]['cid'];

            $category_name = mysqli_fetch_assoc($mysqli->query("SELECT category_name FROM document_categories WHERE id='" . $cid . "'"));

            $uploadfile = $uploaddir . strtolower($category_name['category_name']) . '/' . basename($item);
            if (move_uploaded_file($_FILES['doc']['tmp_name'][$id], $uploadfile)) {
              $result['info'][] = 'Document uploaded successfully.';
            }

            $curr_name = NULL;
            if (!empty($_POST)) {
              if (!empty($_POST['doc'])) {
                if (!empty($_POST['doc'][$id]['name'])) {
                  $curr_name = $_POST['doc'][$id]['name'];
                }
              }
            }

            $path_name = mysqli_fetch_assoc($mysqli->query("SELECT path FROM documents WHERE id='" . $id . "'"));

            if ($path_name['path'] == NULL) {
              $add_mi = 'INSERT INTO documents (id, path, name, category) VALUES ("' . $id . '", "' . strtolower($category_name['category_name']) . '/' . $item . '", "' . $curr_name . '", "' . $cid . '")';
            }
            else {
              $add_mi = "UPDATE documents " .
                " SET path = '" . strtolower($category_name['category_name']) . '/' . $item . "' , name = '" . $curr_name . "', category = '" . $cid . "' " .
                " WHERE id = '" . $id . "' ";
            }

            $adding_miq = $mysqli->query($add_mi);
          }
        }
      }
    }

    if (isset($_POST['doc'])) {
      foreach ($_POST['doc'] as $id => $item) {
        $isFileExist = mysqli_fetch_assoc($mysqli->query('SELECT id FROM documents WHERE id = ' . $id));
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

      if (file_exists($filename['path'])) {
        unlink($filename['path']);
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
