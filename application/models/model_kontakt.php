<?php

class Model_Kontakt extends Model
{
    public function get_data()
    {
        include 'application/connection.php';

        $lang = getLanguage();

        $query = $mysqli->query("SELECT * FROM contact_page  WHERE lid='" . $lang . "'");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res = $r;
            }
        }

        return $res;
    }

        public function edit_data()
    {
        include 'application/connection.php';

        $lang = getLanguage();
        $query = $mysqli->query("SELECT * FROM contact_page WHERE lid='" . $lang . "'");

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

    $map = NULL;
    if (isset($_POST['map'])) {
      $map = $_POST['map'];
    }

        $name = NULL;
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }

    $add_q = "UPDATE contact_page SET name = '" . $name. "', info = '" . $info. "', map = '" . $map. "'  WHERE lid='" . $lang . "'";

    $adding_info_query = $mysqli->query($add_q);

    if($adding_info_query) {
      $result['res'] = true;
    } else {
      $result['res'] = false;
    }

    return $result;
  }

}
