<?php

class Model_Fur_handler extends Model {
  public function set_data() {
    $lang = getLanguage();

    $to = "info@infrared24.com";


    if ($lang == 2) {
      $subject = "=?utf-8?B?" . base64_encode("DEALER INQUIRY") . "?=";
      $subject_dealer = "=?utf-8?B?" . base64_encode("Empfangsbestätigung") . "?=";
    }
    else {
      $subject = "=?utf-8?B?" . base64_encode("HÄNDLER ANFRAGE") . "?=";
      $subject_dealer = "=?utf-8?B?" . base64_encode("Acknowledgment of receipt") . "?=";
    }


    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: info@infrared24.com\r\n";


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


    if ($lang == 2) {
      $message_to_dealer = "
            <html><head><title>Infrared Profi Team</title></head>
            <body><p>Dear ladies and gentlemen, thank you for your inquiry! <br>
                 Our manager will contact you shortly. <br>
                 Best regards, <br>
                 Infrared professional team</p></body></html>";
    }
    else {
      $message_to_dealer = "
            <html><head><title>Infrared Profi Team</title></head>
            <body><p>Sehr geehrte Damen und Herren, danke schön für Ihre Anfrage!<br>
                Unser Manager wird in kürze mit Ihnen Kontakt aufnehmen. <br>
                Herzliche Grüße,<br>
                Infrared Profi Team</p></body></html>";
    }


    mail($to, $subject, $message_to_admin, $headers);
    mail($email, $subject_dealer, $message_to_dealer, $headers);

    return TRUE;
  }

  public function get_data() {
    include 'application/connection.php';

    $lang = getLanguage();

    $query = $mysqli->query("SELECT id FROM registration_angebot");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id_angebot'] = max($rr['arr_of_id']);

    $query = $mysqli->query(
      "SELECT * FROM registration_page WHERE lid='" . $lang . "'"
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
        if ($r['title'] !== '') {
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

    $lang = getLanguage();

    //фон в круге
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

          $add_mi = 'UPDATE registration_page SET service_bg = "registration/' . $service_bg_image . '" WHERE lid="' . $lang . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }
    }

    //фон слева
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

          $add_mi = 'UPDATE registration_page SET angebot_bg = "registration/' . $ang_imagebg . '" WHERE lid="' . $lang . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }
      }
    }

    //service images вокруг кружка
    for ($i = 1; $i <= 6; $i++) {
      if (isset($_FILES)) {
        if ($_FILES['service_image']['size'][$i] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'registration/icons/';
          $uploadfile = $uploaddir . basename($_FILES['service_image']['name'][$i]);
          if ($_FILES['service_image']['size'][$i] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['service_image']['tmp_name'][$i], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $service_image = NULL;
            if (isset($_FILES['service_image']['name'][$i])) {
              $service_image = $_FILES['service_image']['name'][$i];
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

    $i = 1;
    //angebot images справа
    if (isset($_FILES)) {
      foreach ($_FILES['ang_image']['name'] as $ind => $item_name) {
        $i = $ind;
        if ($_FILES['ang_image']['size'][$i] > 0) {
          $uploaddir = IMG_PROJ_PATH . 'registration/icons/';
          $uploadfile = $uploaddir . basename($_FILES['ang_image']['name'][$i]);
          if ($_FILES['ang_image']['size'][$i] <= $_POST['MAX_FILE_SIZE']) {
            if (move_uploaded_file($_FILES['ang_image']['tmp_name'][$i], $uploadfile)) {
              $result['info'][] = 'Image uploaded successfully.';
            }

            $ang_image = NULL;
            if (isset($_FILES['ang_image']['name'][$i])) {
              $ang_image = $_FILES['ang_image']['name'][$i];
            }




            $is_ang_exist = $mysqli->query('SELECT id FROM registration_angebot WHERE id=' . $i);
            if ($is_ang_exist->num_rows > 0) {
              //обновляем название категории по айдишке
              $add_mi = 'UPDATE registration_angebot SET icon = "registration/icons/' . $ang_image . '" WHERE id=' . $i;
            }
            else {
              $add_mi = 'INSERT INTO registration_angebot (id, icon) VALUES (' . $i . ', "registration/icons/'. $ang_image . '")';
            }


            $adding_miq = $mysqli->query($add_mi);
          }
          else {
            $result['info'][] = 'Image is too large.';
          }
        }
      }
    }

    //верхнее заглавие
    $top_block = NULL;
    if (isset($_POST['top_block'])) {
      $top_block = $_POST['top_block'];
    }

    //заглавие над кружком
    $service_title = NULL;
    if (isset($_POST['service_title'])) {
      $service_title = $_POST['service_title'];
    }

    //текст после кружка
    $description = NULL;
    if (isset($_POST['description'])) {
      $description = $_POST['description'];
    }

    //заглавие пунктов справа
    $angebot_title = NULL;
    if (isset($_POST['angebot_title'])) {
      $angebot_title = $_POST['angebot_title'];
    }

    //заглавие формы
    $form_title = NULL;
    if (isset($_POST['form_title'])) {
      $form_title = $_POST['form_title'];
    }

    //сама форма
    $form_content = NULL;
    if (isset($_POST['form_content'])) {
      $form_content = $_POST['form_content'];
    }

        //текст кнопки
    $form_button = NULL;
    if (isset($_POST['button'])) {
      $form_button = $_POST['button'];
    }

    //заглавие страницы
    $title = NULL;
    if (isset($_POST['title'])) {
      $title = $_POST['title'];
    }

    //тексты вокруг кружка
    for ($i = 1; $i <= 6; $i++) {
      $service_description = NULL;
      if (isset($_POST['service_description_' . $i])) {
        $service_description = $_POST['service_description_' . $i];
      }

      $service_eng_description = NULL;
      if (isset($_POST['service_eng_description_' . $i])) {
        $service_eng_description = $_POST['service_eng_description_' . $i];
      }

      if ($lang == 1) {
        $add_q = "UPDATE registration_services SET description = '" . $service_description . "' WHERE id=" . $i;
      }
      else {
        if ($lang == 2) {
          $add_q = "UPDATE registration_services SET   eng_description = '" . $service_eng_description . "' WHERE id=" . $i;
        }
      }

      $adding_d = $mysqli->query($add_q);
    }

    //пункты справа
    for ($i = 1; $i <= 10; $i++) {
      $item_title = NULL;
      if (isset($_POST['item-title'][$i])) {
        $item_title = $_POST['item-title'][$i];
      }

      $item_desc = NULL;
      if (isset($_POST['item-desc'][$i])) {
        $item_desc = $_POST['item-desc'][$i];
      }

      $eng_item_title = NULL;
      if (isset($_POST['eng_item-title'][$i])) {
        $eng_item_title = $_POST['eng_item-title'][$i];
      }

      $eng_item_desc = NULL;
      if (isset($_POST['eng_item-desc'][$i])) {
        $eng_item_desc = $_POST['eng_item-desc'][$i];
      }

      if ($lang == 1) {
        $add_q = "UPDATE registration_angebot SET description = '" . $item_desc . "', title = '" . $item_title . "' WHERE id=" . $i;
      }
      else {
        if ($lang == 2) {
          $add_q = "UPDATE registration_angebot SET eng_description = '" . $eng_item_desc . "', eng_title = '" . $eng_item_title . "' WHERE id=" . $i;
        }
      }

      $adding_d = $mysqli->query($add_q);
    }


    // обновить единичные поля
    $add_q = "UPDATE registration_page " .
      "SET title = '" . $title . "', form_title = '" . $form_title . "', form = '" . $form_content . "', button = '" . $form_button . "', angebot_title = '" . $angebot_title . "', description = '" . $description . "'," .
      " service_title = '" . $service_title . "', top_block = '" . $top_block . "' WHERE lid='" . $lang . "'";
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
