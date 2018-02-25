<?php

class Model_Impressum extends Model {
  public function get_data() {
    include 'application/connection.php';
    $lang = getLanguage();
    $query = $mysqli->query("SELECT * FROM impressum WHERE lid='" . $lang . "'");

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

    $query = $mysqli->query("SELECT * FROM impressum WHERE lid='" . $lang . "'");

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

    $add_q = "UPDATE impressum SET info = '" . $info. "', name = '" . $name . "'  WHERE lid='" . $lang . "'";

    $adding_impressum_info_query = $mysqli->query($add_q);

    if($adding_impressum_info_query) {
      $result['res'] = true;
    } else {
      $result['res'] = false;
    }

    return $result;
  }

}
