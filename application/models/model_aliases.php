<?php

class Model_Aliases extends Model {
  public function get_data() {
    include 'application/connection.php';

    $lang = getLanguage();

    $res = NULL;
    $query = $mysqli->query("SELECT * FROM page_alias");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[$r['id']] = $r;
      }
    }


    return $res;
  }

  public function edit_data() {
    include 'application/connection.php';

    $lang = getLanguage();
    $res = NULL;

    $query = $mysqli->query("SELECT * FROM page_alias");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['main'][$r['id']] = $r;
      }
    }

    $query = $mysqli->query("SELECT id FROM page_alias");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id'] = max($rr['arr_of_id']);


    return $res;
  }

  public function update_data() {
    include 'application/connection.php';
    $lang = getLanguage();

    if (isset($_POST['items'])) {

      foreach ($_POST['items'] as $row) {


        $de = '';
        if (isset($row['de'])) {
          $de = $row['de'];
        }

        $en = '';
        if (isset($row['en'])) {
          $en = $row['en'];
        }

        $id = '';
        if (isset($row['id'])) {
          $id = $row['id'];
        }
        $query = $mysqli->query("SELECT * FROM page_alias WHERE id = '".$id."'");

        if($de == '' and $en == '') {
          $add_q = "DELETE FROM page_alias WHERE id='" . $id . "'";

        } else
        if ($query->num_rows > 0) {
          $add_q = "UPDATE page_alias SET de = '" . $de . "', en = '" . $en . "'  WHERE id='" . $id . "'";

        }
        else {
          $add_q = "INSERT INTO page_alias (de, en) VALUES ('" . $de . "', '" . $en . "')";
        }


        $adding_alias_query = $mysqli->query($add_q);

      }
    }
    if ($adding_alias_query) {
      $result['res'] = TRUE;
    }
    else {
      $result['res'] = FALSE;
    }

    return $result;
  }

}
