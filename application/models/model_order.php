<?php

class Model_Order extends Model {
  public function get_data() {
    include 'application/connection.php';

    $query = $mysqli->query("SELECT id, title FROM products WHERE isInPriceList=1");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $id = $r['id'];

        $qcol = $mysqli->query("SELECT * FROM price_list WHERE product_id=" . $id);
        if ($qcol->num_rows) {

          unset($p_res);
          while ($col_item = mysqli_fetch_assoc($qcol)) {
            $model_id = $col_item['model_id'];
            $colour_id = $col_item['colour_id'];
            $item = $col_item;

            if ($qmod = $mysqli->query("SELECT modell FROM sizes WHERE id=" . $model_id)) {
              $m = mysqli_fetch_assoc($qmod);
              $item['model'] = $m['modell'];
            }

            if ($qcolname = $mysqli->query("SELECT name FROM colours WHERE id=" . $colour_id)) {
              $c = mysqli_fetch_assoc($qcolname);
              $item['colour'] = $c['name'];
            }

            $p_res[] = $item;
          }
          $res[$r['title']] = $p_res;
        }
      }
    }

    return $res;
  }

  public function get_result_data() {
    include 'application/connection.php';

    $res = [];

    foreach ($_POST as $cat_name=>$category) {
      if(!$this->isCategoryOrderEmpty($category)) {
        $cat = [];

        foreach ($category['products'] as $model_name=>$model) {
          if($this->isModelOrderEmpty($model)) {
            $cat['products'][$model_name] = $this->isModelOrderEmpty($model);
          }
        }

        $res[$cat_name] = $cat;
        $res[$cat_name]['comment'] = $category['comment'];
      }
    }

    return $res;

  }

  function isCategoryOrderEmpty($category) {
    $products = $category['products'];

    $res = true;

    foreach($products as $pname=>$pitem) {
      foreach($pitem['count'] as $c) {
        if($c !== '0') {
          $res = false;
          break;
        }
      }
    }

    return $res;
  }

  function isModelOrderEmpty($model) {
    $res = [];

    foreach ($model['count'] as $ind=>$count) {
      if($count !== "0") {
        $res['count'][] = $count;
        if(isset($model['term'][$ind])) {
          $res['term'][] = $model['term'][$ind];
        } else {
          $res['term'][] = 'off';
        }
      }
    }

    return $res;
  }
}
