<?php

class Model_Edit_default_info extends Model {
  public function get_data() {
    include 'application/connection.php';

    $query = $mysqli->query("SELECT id FROM footer_service_links");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id'] = max($rr['arr_of_id']);

    $query = $mysqli->query("SELECT id FROM footer_links");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_link_id'] = max($rr['arr_of_id']);


    $query = $mysqli->query("SELECT id FROM header_links");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rh['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_header_link_id'] = max($rh['arr_of_id']);

    //phones
    $query = $mysqli->query("SELECT id FROM phones");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rp['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id_phone'] = max($rp['arr_of_id']);


    //header phones
    $query = $mysqli->query("SELECT id FROM header_phones");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rhp['arr_of_id'][] = $r['id'];
      }
    }
    if (isset($rhp)) {
      $res['max_id_header_phone'] = max($rhp['arr_of_id']);
    }
    else {
      $res['max_id_header_phone'] = 0;
    }


    //modal menu
    $query = $mysqli->query("SELECT id FROM modal_menu");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $mm['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id_menu'] = max($mm['arr_of_id']);

    return $res;
  }


  public function update_data() {
    include 'application/connection.php';

    //logo
    if (isset($_FILES)) {
      if ($_FILES['logo_image']['size'] > 0) {
        $uploaddir = IMG_PROJ_PATH;
        $uploadfile = $uploaddir . basename($_FILES['logo_image']['name']);
        if ($_FILES['logo_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['logo_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $logo_image = NULL;
          if (isset($_FILES['logo_image']['name'])) {
            $logo_image = $_FILES['logo_image']['name'];
          }

          $add_mi = 'UPDATE default_info SET site_logo = "' . $logo_image . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }

      }
    }

    //footer links
    if (isset($_POST['footer_service_links'])) {
      foreach ($_POST['footer_service_links'] as $name => $item) {
        if (isset($_POST['footer_service_links'][$name])) {

          $isId = mysqli_fetch_assoc($mysqli->query("SELECT id FROM footer_service_links WHERE id='" . $item['id'] . "'"));

          if ($isId['id'] == NULL) {
            $add_mi = 'INSERT INTO footer_service_links (id, title, link) VALUES ("' . $item['id'] . '", "' . $item['title'] . '", "' . $item['link'] . '")';
          }
          else {
            if ($item['title'] == '' and $item['link'] == '') {
              $add_mi = "DELETE FROM footer_service_links  WHERE id='" . $item['id'] . "'";
            }
            else {
              $add_mi = "UPDATE footer_service_links SET title = '" . $item['title'] . "', link = '" . $item['link'] . "' WHERE id = '" . $item['id'] . "' ";
            }
          }

          $adding_info_query = $mysqli->query($add_mi);
        }
      }
    }


    //footer links
    if (isset($_POST['footer_links'])) {
      foreach ($_POST['footer_links'] as $name => $item) {
        if (isset($_POST['footer_links'][$name])) {

          $isId = mysqli_fetch_assoc($mysqli->query("SELECT id FROM footer_links WHERE id='" . $item['id'] . "'"));

          if ($isId['id'] == NULL) {
            $add_mi = 'INSERT INTO footer_links (id, title, link) VALUES ("' . $item['id'] . '", "' . $item['title'] . '", "' . $item['link'] . '")';
          }
          else {
            if ($item['title'] == '' and $item['link'] == '') {
              $add_mi = "DELETE FROM footer_links  WHERE id='" . $item['id'] . "'";
            }
            else {
              $add_mi = "UPDATE footer_links SET title = '" . $item['title'] . "', link = '" . $item['link'] . "' WHERE id = '" . $item['id'] . "' ";
            }
          }

          $adding_info_query = $mysqli->query($add_mi);
        }
      }
    }


    //header links
    if (isset($_POST['header_links'])) {
      foreach ($_POST['header_links'] as $name => $item) {
        if (isset($_POST['header_links'][$name])) {

          $isId = mysqli_fetch_assoc($mysqli->query("SELECT id FROM header_links WHERE id='" . $item['id'] . "'"));

          if ($isId['id'] == NULL) {
            $add_mi = 'INSERT INTO header_links (id, title, link) VALUES ("' . $item['id'] . '", "' . $item['title'] . '", "' . $item['link'] . '")';
          }
          else {
            if ($item['title'] == '' and $item['link'] == '') {
              $add_mi = "DELETE FROM header_links  WHERE id='" . $item['id'] . "'";
            }
            else {
              $add_mi = "UPDATE header_links SET title = '" . $item['title'] . "', link = '" . $item['link'] . "' WHERE id = '" . $item['id'] . "' ";
            }
          }

          $adding_info_query = $mysqli->query($add_mi);
        }
      }
    }


    //phones
    if (isset($_POST['phones'])) {
      foreach ($_POST['phones'] as $name => $item) {
        if (isset($_POST['phones'][$name])) {

          if (isset($_POST['phones'][$name]['tel'])) {
            $isId = mysqli_fetch_assoc($mysqli->query("SELECT id FROM phones WHERE id='" . $item['id'] . "'"));


            if ($isId == NULL) {
              $add_mi = 'INSERT INTO phones (id, text, tel) VALUES ("' . $item['id'] . '", "' . $item['text'] . '", "' . $item['tel'] . '")';
            }
            else {
              if ($item['text'] == '' and $item['tel'] == '') {
                $add_mi = "DELETE FROM phones WHERE id='" . $item['id'] . "'";
              }
              else {
                $add_mi = "UPDATE phones SET text = '" . $item['text'] . "', tel = '" . $item['tel'] . "' WHERE id = '" . $item['id'] . "' ";
              }
            }

            $adding_info_query = $mysqli->query($add_mi);
          }
        }
      }
    }


    //header phones
    if (isset($_POST['header_phones'])) {
      foreach ($_POST['header_phones'] as $name => $item) {
        if (isset($_POST['header_phones'][$name])) {

          if (isset($_POST['header_phones'][$name]['tel'])) {
            $isId = mysqli_fetch_assoc($mysqli->query("SELECT id FROM header_phones WHERE id='" . $item['id'] . "'"));


            if ($isId == NULL) {
              $add_mi = 'INSERT INTO header_phones (id, text, tel) VALUES ("' . $item['id'] . '", "' . $item['text'] . '", "' . $item['tel'] . '")';
            }
            else {
              if ($item['text'] == '' and $item['tel'] == '') {
                $add_mi = "DELETE FROM header_phones WHERE id='" . $item['id'] . "'";
              }
              else {
                $add_mi = "UPDATE header_phones SET text = '" . $item['text'] . "', tel = '" . $item['tel'] . "' WHERE id = '" . $item['id'] . "' ";
              }
            }

            $adding_info_query = $mysqli->query($add_mi);
          }
        }
      }
    }

    //email
    $email = '';
    if (isset($_POST['mail'])) {
      $add_mi = "UPDATE contacts SET value = '" . $_POST['mail'] . "', link = 'mailto:" . $_POST['mail'] . "' WHERE name = 'email' ";

      $adding_info_query = $mysqli->query($add_mi);
    }

    //main menu
    if (isset($_POST['modal_menu'])) {
      foreach ($_POST['modal_menu'] as $name => $item) {
        if (isset($_POST['modal_menu'][$name])) {

          $isId = mysqli_fetch_assoc($mysqli->query("SELECT id FROM modal_menu WHERE id='" . $item['id'] . "'"));

          if ($isId['id'] == NULL) {
            $add_mi = 'INSERT INTO modal_menu (id, title, link) VALUES ("' . $item['id'] . '", "' . $item['title'] . '", "' . $item['link'] . '")';
          }
          else {
            if ($item['title'] == '' and $item['link'] == '') {
              $add_mi = "DELETE FROM modal_menu WHERE id='" . $item['id'] . "'";
            }
            else {
              $add_mi = "UPDATE modal_menu SET title = '" . $item['title'] . "', link = '" . $item['link'] . "' WHERE id = '" . $item['id'] . "' ";
            }
          }

          $adding_info_query = $mysqli->query($add_mi);
        }
      }
    }

    $result['res'] = TRUE;

    return $result;
  }

}
