<?php

class Model_Faq extends Model {
  public function get_data() {
    include 'application/connection.php';
    $query = $mysqli->query("SELECT * FROM faq");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';

    if (isset($_POST['item'])) {
      foreach ($_POST['item'] as $item) {
        if (isset($item['question']) and isset($item['answer'])) {

          $add_q = "UPDATE faq 
          SET question = '" . $item['question'] . "',
          answer = '". $item['answer'] ."'
          WHERE id = '" . $item['id'] . "' ";

          $adding_info_query = $mysqli->query($add_q);
        } else {

          $del_q = "DELETE FROM faq
          WHERE id = '" . $item['id'] . "' ";

          $delete_info_query = $mysqli->query($add_q);

        }
      }
    }

    if ($adding_info_query) {
      $result['res'] = TRUE;
    }
    else {
      $result['res'] = FALSE;
    }

    return $result;
  }
}
