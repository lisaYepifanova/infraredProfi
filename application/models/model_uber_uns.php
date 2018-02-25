<?php

class Model_Uber_uns extends Model {
  public function get_data() {
    include 'application/connection.php';
    $lang = getLanguage();
    $query = $mysqli->query("SELECT * FROM uber_uns WHERE lid=".$lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res = $r;
      }
    }

    return $res;
  }

  public function edit_data() {
    include 'application/connection.php';
    $lang = getLanguage();
    $query = $mysqli->query("SELECT * FROM uber_uns WHERE lid=".$lang);

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
    //загрузка фото на сервер
    if (isset($_FILES)) {
      if ($_FILES['mission_img']['size'] > 0) {
        $uploaddir = '/home/lisabeth/Projects/infraredprofi/img/about-us/';
        $uploadfile = $uploaddir . basename($_FILES['mission_img']['name']);
        if ($_FILES['mission_img']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['mission_img']['tmp_name'], $uploadfile )) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $mission_img = NULL;
          if (isset($_FILES['mission_img']['name'])) {
            $mission_img = $_FILES['mission_img']['name'];
          }

          $add_mi = 'UPDATE uber_uns SET mission_img = "about-us/' . $mission_img . '" WHERE lid='.$lang;
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }


      }
    }


    if (isset($_FILES)) {
      if ($_FILES['vision_img']['size'] > 0) {
        $uploaddir = '/home/lisabeth/Projects/infraredprofi/img/about-us/';
        $uploadfile = $uploaddir . basename($_FILES['vision_img']['name']);
        if ($_FILES['vision_img']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file(
            $_FILES['vision_img']['tmp_name'],
            $uploadfile
          )) {
            $result['info'][] = 'Image uploaded successfully.';

            $vision_img = NULL;
            if (isset($_FILES['vision_img']['name'])) {
              $vision_img = $_FILES['vision_img']['name'];
            }

            $add_vi = 'UPDATE uber_uns SET vision_img = "about-us/' . $vision_img . '" WHERE lid='.$lang;
            $adding_viq = $mysqli->query($add_vi);
          }
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }
    }

    $mission_text = NULL;
    if (isset($_POST['mission_text'])) {
      $mission_text = $_POST['mission_text'];
    }

    $vision_text = NULL;
    if (isset($_POST['vision_text'])) {
      $vision_text = $_POST['vision_text'];
    }

    $about_us_description = NULL;
    if (isset($_POST['about_us_description'])) {
      $about_us_description = $_POST['about_us_description'];
    }

    $name = NULL;
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }

    $add_q = "UPDATE uber_uns SET mission_text = '" . $mission_text . "', vision_text = '" . $vision_text . "', about_us_description = '" . $about_us_description . "', name='" . $name . "' WHERE lid=".$lang;

    $adding_uu_query = $mysqli->query($add_q);

    if($adding_uu_query) {
      $result['res'] = true;
    } else {
      $result['res'] = false;
    }

    return $result;
  }

}
