<?php

class Model_Faq extends Model {
  public function get_data() {
    include 'application/connection.php';
    $lang = getLanguage();

    $res = NULL;
    $query = $mysqli->query("SELECT * FROM faq WHERE lid='" . $lang . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['main'][] = $r;
      }
    }

    $r = [];
    $querym = $mysqli->query("SELECT id FROM faq");
    if ($querym) {

      while ($r = mysqli_fetch_assoc($querym)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_id'] = max($rr['arr_of_id']);


    return $res;
  }

  public function update_data() {
    include 'application/connection.php';
    $lang = getLanguage();

    if (isset($_POST['item'])) {
      foreach ($_POST['item'] as $item) {
        if (isset($item['question']) and isset($item['answer'])) {

           $query = $mysqli->query("SELECT id FROM faq WHERE id='" . $item['id'] . "'");

          if ($query->num_rows > 0) {
            //обновляем название категории по айдишке
              $add_q = "UPDATE faq SET question = '" . $item['question'] . "', answer = '" . $item['answer'] . "', lid = '" . $lang . "' WHERE id = '" . $item['id'] . "'  ";
          }
          else {
            $add_q = 'INSERT INTO faq (id, question, answer, lid) VALUES ("' . $item['id'] . '", "' . $item['question'] . '", "' . $item['answer'] . '", "' . $lang . '")';
          }

          $adding_info_query = $mysqli->query($add_q);
        }
        else {

          $del_q = "DELETE FROM faq WHERE id = '" . $item['id'] . "' ";

          $delete_info_query = $mysqli->query($del_q );

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
