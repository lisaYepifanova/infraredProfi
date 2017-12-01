<?php

class Model_Default extends Model {
  public function get_data() {

    include 'application/connection.php';
    $query = $mysqli->query("SELECT * FROM default_info");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['logo'][] = $r;
      }
    }

        $query = $mysqli->query("SELECT * FROM footer_links");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['footer_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM footer_service_links");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['footer_service_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM phones");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['phones'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM contacts");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['contacts'][] = $r;
      }
    }


    $query = $mysqli->query("SELECT * FROM modal_menu");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['modal_menu'][] = $r;
      }
    }

    return $res;
  }
}
