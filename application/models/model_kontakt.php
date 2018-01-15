<?php

class Model_Kontakt extends Model
{
    public function get_data()
    {
        include 'application/connection.php';
        $query = $mysqli->query("SELECT * FROM contact_page");

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
        $query = $mysqli->query("SELECT * FROM contact_page");

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

    $map = NULL;
    if (isset($_POST['map'])) {
      $map = $_POST['map'];
    }

    $add_q = "UPDATE contact_page SET info = '" . $info. "', map = '" . $map. "'";

    $adding_info_query = $mysqli->query($add_q);

    if($adding_info_query) {
      $result['res'] = true;
    } else {
      $result['res'] = false;
    }

    return $result;
  }

}
