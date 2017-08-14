<?php

class Model_Fur_handler extends Model
{
    public function set_data()
    {
        $to = "kontakt@infraredprofi.de";
        $subject = "=?utf-8?B?".base64_encode("Anfrage von einem Händler")."?=";
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
                    <p><b>Имя: </b>'.$name.'</p>
                    <p><b>Номер телефона: </b>'.$telephone.'</p>
                    <p><b>Регион: </b>'.$bundesland.'</p>
                    <p><b>Почта: </b>'.$email.'</p>
                    <p><b>Дополнительно: </b>'.$ihre_nachricht.'</p></div>';

        $message_to_admin = "
            <html><head><title>Новый запрос от дилера</title></head>
            <body><h3>Новый запрос от дилера</h3>'.$info.'</body></html>";

        $message_to_dealer = "
            <html><head><title>Infrared Profi Team</title></head>
            <body><p>Sehr geehrte Damen und Herren, danke schön für Ihre Anfrage!<br>
                Unser Manager wird in kürze mit Ihnen Kontakt aufnehmen. <br>
                Herzliche Grüße,<br>
                Infrared Profi Team</p></body></html>";

        mail($to, $subject, $message_to_admin, $headers);
        mail($email, $subject, $message_to_dealer, $headers);

        return true;
    }

    public function get_data()
    {
        include 'application/connection.php';

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
                $res['angebot'][] = $r;
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
}
