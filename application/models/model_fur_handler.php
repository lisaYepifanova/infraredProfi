<?php

class Model_Fur_handler extends Model {
  public function set_data() {
    $to = "hybrotech.de@gmail.com";
    $subject = "=?utf-8?B?" . base64_encode("HÄNDLER ANFRAGE") . "?=";
    $subject_dealer = "=?utf-8?B?" . base64_encode("Empfangsbestätigung") . "?=";
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: kontakt@infraredprofi.de\r\n";


    $name = 'не указано';
    $telephone = 'не указано';
    $bundesland = 'не указано';
    $email = 'не указано';
    $ihre_nachricht = 'не указано';

    if (!empty($_POST['name'])) {
      $name = $_POST['name'];
    }

    if (!empty($_POST['telephone'])) {
      $telephone = $_POST['telephone'];
    }

    if (!empty($_POST['bundesland'])) {
      $bundesland = $_POST['bundesland'];
    }

    if (!empty($_POST['email'])) {
      $email = $_POST['email'];
    }

    if (!empty($_POST['ihre_nachricht'])) {
      $ihre_nachricht = $_POST['ihre_nachricht'];
    }

    $info = '<div style="font-size:16px;">
                    <p><b>Имя: </b>' . $name . '</p>
                    <p><b>Номер телефона: </b>' . $telephone . '</p>
                    <p><b>Регион: </b>' . $bundesland . '</p>
                    <p><b>Почта: </b>' . $email . '</p>
                    <p><b>Дополнительно: </b>' . $ihre_nachricht . '</p></div>';

    $message_to_admin = "
            <html><head><title>Новый запрос от дилера</title></head>
            <body><h3>Новый запрос от дилера</h3>" . $info . "</body></html>";

    $message_to_dealer = "
            <html><head><title>Infrared Profi Team</title></head>
            <body><p>Sehr geehrte Damen und Herren, danke schön für Ihre Anfrage!<br>
                Unser Manager wird in kürze mit Ihnen Kontakt aufnehmen. <br>
                Herzliche Grüße,<br>
                Infrared Profi Team</p></body></html>";

    mail($to, $subject, $message_to_admin, $headers);
    mail($email, $subject_dealer, $message_to_dealer, $headers);

    return TRUE;
  }

  public function get_data() {
    include 'application/connection.php';

     $query = $mysqli->query("SELECT id FROM registration_angebot");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id_angebot'] = max($rr['arr_of_id']);

    $query = $mysqli->query(
      "SELECT * FROM registration_page WHERE id=1"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['main_info'] = $r;
      }
    }

    $query = $mysqli->query(
      "SELECT * FROM registration_services"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['services'][] = $r;
      }
    }

    $query = $mysqli->query(
      "SELECT * FROM registration_angebot"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        if($r['title'] !== '') {
          $res['angebot'][] = $r;
        }
      }
    }

    $query = $mysqli->query(
      "SELECT * FROM bundesland"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bundesland'][] = $r;
      }
    }

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';

    if (isset($_FILES)) {
      if ($_FILES['service_bg_image']['size'] > 0) {
        $uploaddir = IMG_PROJ_PATH . 'registration/';
        $uploadfile = $uploaddir . basename($_FILES['service_bg_image']['name']);
        if ($_FILES['service_bg_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['service_bg_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $service_bg_image = NULL;
          if (isset($_FILES['service_bg_image']['name'])) {
            $service_bg_image = $_FILES['service_bg_image']['name'];
          }

          $add_mi = 'UPDATE registration_page SET service_bg = "registration/' . $service_bg_image . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }
    }

    if (isset($_FILES)) {
      if ($_FILES['ang_imagebg']['size'] > 0) {
        $uploaddir = IMG_PROJ_PATH . 'registration/';
        $uploadfile = $uploaddir . basename($_FILES['ang_imagebg']['name']);
        if ($_FILES['ang_imagebg']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['ang_imagebg']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $ang_imagebg = NULL;
          if (isset($_FILES['ang_imagebg']['name'])) {
            $ang_imagebg = $_FILES['ang_imagebg']['name'];
          }

          $add_mi = 'UPDATE registration_page SET angebot_bg = "registration/' . $ang_imagebg . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }
    }

    //service images
    for ($i = 1; $i <= 6; $i++) {
      if (isset($_FILES)) {
        if ($_FILES['service_image_' . $i]['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'registration/icons/';
          $uploadfile = $uploaddir . basename($_FILES['service_image_' . $i]['name']);
          if ($_FILES['service_image_' . $i]['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['service_image_' . $i]['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $service_image = NULL;
            if (isset($_FILES['service_image_' . $i]['name'])) {
              $service_image = $_FILES['service_image_' . $i]['name'];
            }

            $add_mi = 'UPDATE registration_services SET icon = "registration/icons/' . $service_image . '" WHERE id=' . $i;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }
        }
      }
    }

    //angebot images
    for ($i = 1; $i <= 3; $i++) {
      if (isset($_FILES)) {
        if ($_FILES['ang_image' . $i]['size'] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'registration/icons/';
          $uploadfile = $uploaddir . basename($_FILES['ang_image' . $i]['name']);
          if ($_FILES['ang_image' . $i]['size'] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['ang_image' . $i]['tmp_name'], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $ang_image = NULL;
            if (isset($_FILES['ang_image' . $i]['name'])) {
              $ang_image = $_FILES['ang_image' . $i]['name'];
            }

            $add_mi = 'UPDATE registration_angebot SET icon = "registration/icons/' . $ang_image . '" WHERE id=' . $i;
            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }
        }
      }
    }


    $top_block = NULL;
    if (isset($_POST['top_block'])) {
      $top_block = $_POST['top_block'];
    }

    $service_title = NULL;
    if (isset($_POST['service_title'])) {
      $service_title = $_POST['service_title'];
    }

    $description = NULL;
    if (isset($_POST['description'])) {
      $description = $_POST['description'];
    }

    $angebot_title = NULL;
    if (isset($_POST['angebot_title'])) {
      $angebot_title = $_POST['angebot_title'];
    }

    $form_title = NULL;
    if (isset($_POST['form_title'])) {
      $form_title = $_POST['form_title'];
    }

    for ($i = 1; $i <= 6; $i++) {
      $service_description = NULL;
      if (isset($_POST['service_description_' . $i])) {
        $service_description = $_POST['service_description_' . $i];
      }

      $add_q = "UPDATE registration_services SET description = '" . $service_description . "' WHERE id=" . $i;
      $adding_d = $mysqli->query($add_q);
    }

    for ($i = 1; $i <= 10; $i++) {
      $item_title = NULL;
      if (isset($_POST['item-title_' . $i])) {
        $ind='item-title_' . $i;
        $item_title = $_POST[$ind];
      }

      $item_desc = NULL;
      if (isset($_POST['item-desc_' . $i])) {
        $ind='item-desc_' . $i;
        $item_desc = $_POST[$ind];
      }

      $add_q = "UPDATE registration_angebot SET description = '" . $item_desc . "', title = '" . $item_title . "' WHERE id=" . $i;
      $adding_d = $mysqli->query($add_q);
    }


    $add_q = "UPDATE registration_page ".
      "SET form_title = '" . $form_title . "', angebot_title = '" . $angebot_title . "', description = '" . $description . "',".
      " service_title = '" . $service_title . "', top_block = '" . $top_block . "'";
    $adding_impressum_info_query = $mysqli->query($add_q);

    if ($adding_impressum_info_query) {
      $result['res'] = TRUE;
    }
    else {
      $result['res'] = FALSE;
    }

    return $result;
  }
}
