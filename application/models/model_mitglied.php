<?php

class Model_Mitglied extends Model {
  public function get_data() {
    include 'application/connection.php';
    $query = $mysqli->query("SELECT * FROM mitglied");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res = $r;
      }
    }

    return $res;
  }

  public function edit_data() {
    include 'application/connection.php';
    $query = $mysqli->query("SELECT * FROM mitglied");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res = $r;
      }
    }

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';

    $info = NULL;
    if (isset($_POST['info'])) {
      $info = $_POST['info'];
    }

    $add_q = "UPDATE mitglied SET info = '" . $info. "'";

    $adding_mit_info_query = $mysqli->query($add_q);

    if($adding_mit_info_query) {
      $result['res'] = true;
    } else {
      $result['res'] = false;
    }

    return $result;
  }

}
