<?php

class Model_Technologie extends Model {
  public function get_data() {
    include 'application/connection.php';
    $lang = getLanguage();
    $query = $mysqli->query("SELECT * FROM technologie WHERE lid=" . $lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res = $r;
      }
    }

    return $res;
  }


  public function update_data() {
    include 'application/connection.php';

    $lang = getLanguage();
    $uploaddir = IMG_PROJ_PATH . 'technology/';
    //загрузка фото на сервер
    if (isset($_FILES)) {
      if ($_FILES['description_image']['size'] > 0) {
        $uploadfile = $uploaddir . basename($_FILES['description_image']['name']);
        if ($_FILES['description_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['description_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $description_image = NULL;
          if (isset($_FILES['description_image']['name'])) {
            $description_image = $_FILES['description_image']['name'];
          }

          $add_mi = 'UPDATE technologie SET description_image = "technology/' . $description_image . '" WHERE lid="'.$lang.'"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }


      if ($_FILES['comparison_infra_image']['size'] > 0) {
        $uploadfile = $uploaddir . basename($_FILES['comparison_infra_image']['name']);
        if ($_FILES['comparison_infra_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['comparison_infra_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $comparison_infra = NULL;
          if (isset($_FILES['comparison_infra_image']['name'])) {
            $comparison_infra = $_FILES['comparison_infra_image']['name'];
          }

          $add_mi = 'UPDATE technologie SET comparison_infra = "technology/' . $comparison_infra . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }

    }

    if (isset($_FILES)) {
      if ($_FILES['comparison_convect_image']['size'] > 0) {
        $uploadfile = $uploaddir . basename($_FILES['comparison_convect_image']['name']);
        if ($_FILES['comparison_convect_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['comparison_convect_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $comparison_convect = NULL;
          if (isset($_FILES['comparison_convect_image']['name'])) {
            $comparison_convect = $_FILES['comparison_convect_image']['name'];
          }

          $add_mi = 'UPDATE technologie SET comparison_convect = "technology/' . $comparison_convect . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }
    }


    if ($_FILES['convect_house_image']['size'] > 0) {
      $uploadfile = $uploaddir . basename($_FILES['convect_house_image']['name']);
      if ($_FILES['convect_house_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
        if (move_uploaded_file($_FILES['convect_house_image']['tmp_name'], $uploadfile)) {
          $result['info'][] = 'Image uploaded successfully.';
        }

        $convect_house_image = NULL;
        if (isset($_FILES['convect_house_image']['name'])) {
          $convect_house_image = $_FILES['convect_house_image']['name'];
        }

        $add_mi = 'UPDATE technologie SET convect_house_image = "technology/' . $convect_house_image . '"';
        $adding_miq = $mysqli->query($add_mi);
      }
      else {
        $result['info'][] = 'Image is too large.';
      }
    }


    if ($_FILES['infra_house_image']['size'] > 0) {
      $uploadfile = $uploaddir . basename($_FILES['infra_house_image']['name']);
      if ($_FILES['infra_house_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
        if (move_uploaded_file($_FILES['infra_house_image']['tmp_name'], $uploadfile)) {
          $result['info'][] = 'Image uploaded successfully.';
        }

        $infra_house_image = NULL;
        if (isset($_FILES['infra_house_image']['name'])) {
          $infra_house_image = $_FILES['infra_house_image']['name'];
        }

        $add_mi = 'UPDATE technologie SET infra_house_image = "technology/' . $infra_house_image . '"';
        $adding_miq = $mysqli->query($add_mi);
      }
      else {
        $result['info'][] = 'Image is too large.';
      }
    }

    $description_before = NULL;
    if (isset($_POST['description_before'])) {
      $description_before = $_POST['description_before'];
    }

    $description_after = NULL;
    if (isset($_POST['description_after'])) {
      $description_after = $_POST['description_after'];
    }

    $infra_title = NULL;
    if (isset($_POST['infra_title'])) {
      $infra_title = $_POST['infra_title'];
    }

    $infra_text = NULL;
    if (isset($_POST['infra_text'])) {
      $infra_text = $_POST['infra_text'];
    }

    $convect_title = NULL;
    if (isset($_POST['convect_title'])) {
      $convect_title = $_POST['convect_title'];
    }

    $convect_text = NULL;
    if (isset($_POST['convect_text'])) {
      $convect_text = $_POST['convect_text'];
    }

    $scheme_title = NULL;
    if (isset($_POST['scheme_title'])) {
      $scheme_title = $_POST['scheme_title'];
    }

    $convect_house_title = NULL;
    if (isset($_POST['convect_house_title'])) {
      $convect_house_title = $_POST['convect_house_title'];
    }

    $convect_house_description = NULL;
    if (isset($_POST['convect_house_description'])) {
      $convect_house_description = $_POST['convect_house_description'];
    }

    $infra_house_title = NULL;
    if (isset($_POST['infra_house_title'])) {
      $infra_house_title = $_POST['infra_house_title'];
    }

    $infra_house_description = NULL;
    if (isset($_POST['infra_house_description'])) {
      $infra_house_description = $_POST['infra_house_description'];
    }

    $name = NULL;
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }

    //собственно запрос
    $add_q = "UPDATE technologie SET description_before = '" . $description_before . "'," .
      "description_after = '" . $description_after . "'," .
      "infra_title = '" . $infra_title . "'," .
      "infra_text = '" . $infra_text . "'," .
      "convect_title = '" . $convect_title . "'," .
      "convect_text = '" . $convect_text . "'," .
      "scheme_title = '" . $scheme_title . "'," .
      "name = '" . $name . "'," .
      "convect_house_title = '" . $convect_house_title . "'," .
      "convect_house_description = '" . $convect_house_description . "'," .
      "infra_house_title = '" . $infra_house_title . "'," .
      "infra_house_description = '" . $infra_house_description . "' WHERE lid=" . $lang;

    $adding_info_query = $mysqli->query($add_q);


    //
    if ($adding_info_query) {
      $result['res'] = TRUE;
    }
    else {
      $result['res'] = FALSE;
    }

    return $result;
  }

}
