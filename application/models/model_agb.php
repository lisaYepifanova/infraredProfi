<?php

class Model_Agb extends Model {
  public function get_data() {
    include 'application/connection.php';

    $lang = getLanguage();

    $res = NULL;
    $query = $mysqli->query("SELECT * FROM agb WHERE lid='" . $lang . "'");

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

    $query = $mysqli->query("SELECT * FROM agb WHERE lid='" . $lang . "'");

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
    $info = NULL;
    if (isset($_POST['info'])) {
      $info = $_POST['info'];
    }

    $name = NULL;
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }

    $add_q = "UPDATE agb SET info = '" . $info . "', name = '" . $name . "'  WHERE lid='" . $lang . "'";

    $adding_agb_info_query = $mysqli->query($add_q);

    if ($adding_agb_info_query) {
      $result['res'] = TRUE;
    }
    else {
      $result['res'] = FALSE;
    }

    return $result;
  }

}
