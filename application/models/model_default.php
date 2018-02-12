<?php

class Model_Default extends Model {
  public function get_data() {

    include 'application/connection.php';

    /*   $query = $mysqli->query("");
         $upd = $mysqli->query($query);
     *
     *   $query = $mysqli->query("CREATE TABLE `languages` (`id` INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(45) NULL, `name` VARCHAR(45) NULL, `icon` TEXT NULL, PRIMARY KEY (`id`))");
         $upd = $mysqli->query($query);
     *
     *   $query = $mysqli->query("INSERT INTO `languages` (`id`, `title`, `name`, `icon`) VALUES ('1', 'DE', 'deutsch', 'DE.png')");
         $upd = $mysqli->query($query);
     *
     *   $query = $mysqli->query("INSERT INTO `languages` (`id`, `title`, `name`, `icon`) VALUES ('2', 'EN', 'english', 'EN.png')");
         $upd = $mysqli->query($query);




     *

     */

        $query = $mysqli->query("SELECT * FROM languages");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['languages'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM mitglied");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['mitglied'] = $r;
      }
    }

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

    $query = $mysqli->query("SELECT * FROM header_links");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_links'][] = $r;
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

    $query = $mysqli->query("SELECT * FROM header_phones");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_phones'][] = $r;
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
