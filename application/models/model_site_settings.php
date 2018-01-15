<?php

class Model_Site_settings extends Model {
  public function get_data() {
    include 'application/connection.php';
    $query = $mysqli->query("SELECT * FROM site_settings");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    return $res;
  }


  public function update_data() {
    include 'application/connection.php';


    //$upd_q = "UPDATE sssssss SET info = '" . $info. "' WHERE id='".$id."'";
    //$upd_ss_info_query = $mysqli->query($upd_q);

    //if($upd_ss_info_query) {
      $result['res'] = true;
    //} else {
      //$result['res'] = false;
    //}

    return $result;
  }

}
