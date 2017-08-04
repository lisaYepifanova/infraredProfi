<?php

class Model_Fur_handler extends Model
{
    public function set_data()
    {
        $to = "lisa.yepifanova@gmail.com";
        $subject = "=?utf-8?B?".base64_encode("Запрос от дилера")."?=";
        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: testmail@infrared-profi.zzz.com.ua\r\n";

        $name = '';
        $telephone = '';
        $bundesland = '';
        $ihre_nachricht = '';

        if(!empty($_POST['name'])) {
            $name = $_POST['name'];
        }

        if(!empty($_POST['telephone'])) {
            $telephone = $_POST['telephone'];
        }

        if(!empty($_POST['bundesland'])) {
            $bundesland = $_POST['bundesland'];
        }


         if(!empty($_POST['ihre_nachricht'])) {
            $ihre_nachricht = $_POST['ihre_nachricht'];
        }

        $message = "
            <html>
            <head>
                    <title>Новый запрос от дилера</title>
            </head>
            <body>
            <h3>Новый запрос от дилера</h3>
                    <div style='font-size:16px;'>
                    <p><b>Имя: </b>".$name."</p>
                    <p><b>Номер телефона: </b>".$telephone."</p>
                    <p><b>Регион: </b>".$bundesland."</p>
                    <p><b>Дополнительно: </b>".$ihre_nachricht."</p>
                    
            </div>
            </body>
            </html>";

        if (mail($to, $subject, $message, $headers)) {
            //echo 'ok';
        } else {
            //echo 'error';
        }
        $t = $_POST;
        $debug = true;

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