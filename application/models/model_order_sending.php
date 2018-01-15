<?php

class Model_Order_Sending extends Model {
  public function send_data() {

    include 'application/connection.php';
    $order = "";

    if (isset($_POST)) {
      $data = $_POST['data'];
      foreach ($data as $name => $row) {
        $order .= '<div class="">';
        $order .= '<h4 class="">' . str_replace("_", " ", $name) . '</h4>';
        $order .= '<div class="">';
        foreach ($row['products'] as $itemName => $item) {
          $order .= '<div class=""';
          $order .= '<p class="">';
          $order .= str_replace("-", " ", $itemName) . '</br>';

          foreach ($item['count'] as $ind => $count) {
            if (!isset($item['term'][$ind])) {
              $order .= 'Without termostat: ';
            }
            else {
              $order .= 'With termostat: ';
            }
            $order .= $count . " items.</br>";
          }
          $order .= '</p>';
          $order .= '</div>';
        }
        $order .= '</div>';
        $order .= '<div class="">' . $row["comments"] . '</div>';
        $order .= '</div>';
      }
    }


    //$to = "hybrotech.de@gmail.com";
    $to = "ladydowaakhin@gmail.com";
    $subject = "=?utf-8?B?" . base64_encode("HÄNDLER ANFRAGE") . "?=";
    $subject_dealer = "=?utf-8?B?" . base64_encode("Empfangsbestätigung") . "?=";
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: lisa.yepifanova@gmail.com\r\n";

    $uid = getID();

    $qname = $mysqli->query(
      "SELECT uname, surname, phone, email, address, bank_account FROM users WHERE id=" . $uid
    );

    $name = '';

    if ($qname) {
      while ($r = mysqli_fetch_assoc($qname)) {
        $name .= $r['uname'];
        $name .= ' '.$r['surname'];
      }
    }

    $qphone = $mysqli->query(
      "SELECT phone FROM users WHERE id=" . $uid
    );

    $telephone = '';

    if ($qphone) {
      while ($r = mysqli_fetch_assoc($qphone)) {
        $telephone .= $r['phone'] . ' ';
      }
    }

    $qaddress = $mysqli->query(
      "SELECT address FROM users WHERE id=" . $uid
    );

    $address = '';

    if ($qaddress) {
      while ($r = mysqli_fetch_assoc($qaddress)) {
        $address .= $r['address'] . ' ';
      }
    }

    $qemail = $mysqli->query(
      "SELECT email FROM users WHERE id=" . $uid
    );

    $email = '';

    if ($qemail) {
      while ($r = mysqli_fetch_assoc($qemail)) {
        $email .= $r['email'];
      }
    }


    $qbundid = $mysqli->query(
      "SELECT bundeslandid FROM users WHERE id='" . $uid . "'"
    );

    if ($qbundid) {
      while ($r = mysqli_fetch_assoc($qbundid)) {
        $bund_id = $r;
      }
    }

    $qbundname = $mysqli->query(
      "SELECT name FROM bundesland WHERE id=" . $bund_id['bundeslandid']
    );

    if ($qbundname) {
      while ($r = mysqli_fetch_assoc($qbundname)) {
        $bund = $r['name'];
      }
    }

    $address .= ', ' . $bund;


    $info = '<div style="font-size:16px;">
                    <p><b>Имя: </b>' . $name . '</p>
                    <p><b>Номер телефона: </b>' . $telephone . '</p>
                    <p><b>Адресс: </b>' . $address . '</p>
                    <p><b>Почта: </b>' . $email . '</p></div>';

    $message_to_admin = "
            <html><head><title>Новый запрос от дилера</title></head>
            <body><h3>Новый запрос от дилера</h3>" . $info . $order . "
            
            </body></html>";

    $message_to_dealer = "
            <html><head><title>Infrared Profi Team</title></head>
            <body>
            <p>You ordered the following items:</p>
            " . $order . "
</body></html>";

    mail($to, $subject, $message_to_admin, $headers);
    mail($email, $subject_dealer, $message_to_dealer, $headers);

    return TRUE;
  }
}
