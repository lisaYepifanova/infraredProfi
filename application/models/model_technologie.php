<?php

class Model_Technologie extends Model {
  public function get_data() {
    include 'application/connection.php';
    $query = $mysqli->query("SELECT * FROM technologie");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res = $r;
      }
    }

   return $res;
  }
}
