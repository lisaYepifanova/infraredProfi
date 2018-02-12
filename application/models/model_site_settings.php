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


    if (isset($_POST['link'])) {
      foreach ($_POST['link'] as $id => $item) {
        if (isset($_POST['link'][$id])) {

          $isId = mysqli_fetch_assoc($mysqli->query("SELECT id FROM site_settings WHERE id='" . $item['id'] . "'"));

          if ($isId['id'] == NULL) {
            $add_mi = 'INSERT INTO site_settings (id, link_name, link_path) VALUES ("' . $item['id'] . '", "' . $item['name'] . '", "' . $item['path'] . '")';
          }
          else {
            if($item['name'] == '' and $item['path'] == '') {
                $add_mi = "DELETE FROM site_settings  WHERE id='".$item['id']."'";
              } else {
              $add_mi = "UPDATE site_settings SET link_name = '" . $item['name'] . "', link_path = '" . $item['path'] . "' WHERE id = '" . $item['id'] . "' ";
            }
          }

          $adding_info_query = $mysqli->query($add_mi);
        }
      }
    }



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
