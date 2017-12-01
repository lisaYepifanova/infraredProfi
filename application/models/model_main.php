<?php

class Model_Main extends Model {
  public function get_data() {
    include 'application/connection.php';

    $query = $mysqli->query("SELECT id FROM header_properties");
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $rr['arr_of_id'][] = $r['id'];
      }
    }

    $res['max_prop_id'] = max($rr['arr_of_id']);


    $query = $mysqli->query("SELECT * FROM homepage_info");

    if ($query) {
      $r = mysqli_fetch_assoc($query);
      $res['header_title'] = $r['header_title'];
      $res['property_title'] = $r['property_title'];
      $res['property_image'] = $r['property_image'];
    }

    $query = $mysqli->query("SELECT * FROM header_slider");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_slider'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM header_properties");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['property_items'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM gallery_images");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['gallery'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM gallery_bg");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['gallery_bg'] = $r;
      }
    }

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';

    //загрузка карусели
    if (isset($_FILES)) {
      if (isset($_FILES['carousel_image'])) {
        foreach ($_FILES['carousel_image']['name'] as $name => $item) {
          if ($_FILES['carousel_image']['size'][$name] > 0) {
            $uploaddir = IMG_PROJ_PATH;
            $uploadfile = $uploaddir . basename($_FILES['carousel_image']['name'][$name]);
            if ($_FILES['carousel_image']['size'][$name] <= $_POST['MAX_FILE_SIZE']) {
              if (move_uploaded_file($_FILES['carousel_image']['tmp_name'][$name], $uploadfile)) {
                $result['info'][] = 'Image uploaded successfully.';
              }

              $carousel_image = NULL;
              if (isset($_FILES['carousel_image']['name'][$name])) {
                $carousel_image = $_FILES['carousel_image']['name'][$name];
              }

              $curr_id = NULL;
              if (!empty($_POST)) {
                if (!empty($_POST['carousel_image'])) {
                  if (!empty($_POST['carousel_image'][$name])) {
                    $curr_id = $_POST['carousel_image'][$name];
                  }
                }
              }


              $add_mi = 'UPDATE header_slider SET img = "slider/' . $carousel_image . '" WHERE id="' . $curr_id . '"';
              $adding_miq = $mysqli->query($add_mi);
            }
            else {
              $result['info'][] = 'Image is too large.';
            }
          }
        }
      }
    }

    //загрузка иконок из properties
    if (isset($_FILES)) {
      if (isset($_FILES['property'])) {
        foreach ($_FILES['property']['name'] as $name => $item) {
          if ($_FILES['property']['size'][$name]['image'] > 0) {
            $uploaddir = IMG_PROJ_PATH;
            $uploadfile = $uploaddir . 'icons/properties/' . basename($_FILES['property']['name'][$name]['image']);
            if ($_FILES['property']['size'][$name]['image'] <= $_POST['MAX_FILE_SIZE']) {
              if (move_uploaded_file($_FILES['property']['tmp_name'][$name]['image'], $uploadfile)) {
                $result['info'][] = 'Image uploaded successfully.';
              }

              $image = NULL;
              if (isset($_FILES['property']['name'][$name]['image'])) {
                $image = $_FILES['property']['name'][$name]['image'];
              }

              $curr_id = NULL;
              if (!empty($_POST)) {
                if (!empty($_POST['property'])) {
                  if (!empty($_POST['property'][$name])) {
                    $curr_id = $_POST['property'][$name]['id'];
                  }
                }
              }

              $sel = 'SELECT id FROM header_properties WHERE id=' . $curr_id;
              $query = $mysqli->query($sel);

              $isId = mysqli_fetch_assoc($query);

              if ($isId['id'] == NULL) {
                $add_mi = 'INSERT INTO header_properties (id, icon) VALUES ("' . $curr_id . '", "icons/properties/' . $image . '")';
              }
              else {
                $add_mi = 'UPDATE header_properties SET icon = "icons/properties/' . $image . '" WHERE id="' . $curr_id . '"';
              }
              $adding_miq = $mysqli->query($add_mi);
            }
            else {
              $result['info'][] = 'Image is too large.';
            }
          }
        }
      }
    }

    //загрузка подписи
    if (isset($_FILES)) {
      if ($_FILES['sign_image']['size'] > 0) {
        $uploaddir = IMG_PROJ_PATH;
        $uploadfile = $uploaddir . basename($_FILES['sign_image']['name']);
        if ($_FILES['sign_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['sign_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $sign_image = NULL;
          if (isset($_FILES['sign_image']['name'])) {
            $sign_image = $_FILES['sign_image']['name'];
          }

          $add_mi = 'UPDATE homepage_info SET sign_image = "' . $sign_image . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }

      }
    }

    //загрузка фона properties
    if (isset($_FILES)) {
      if ($_FILES['property_image']['size'] > 0) {
        $uploaddir = IMG_PROJ_PATH;
        $uploadfile = $uploaddir . basename($_FILES['property_image']['name']);
        if ($_FILES['property_image']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['property_image']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $property_image = NULL;
          if (isset($_FILES['property_image']['name'])) {
            $property_image = $_FILES['property_image']['name'];
          }

          $add_mi = 'UPDATE homepage_info SET property_image = "' . $property_image . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }

      }
    }

    //загрузка фона галереи
    if (isset($_FILES)) {
      if ($_FILES['gallery_bg']['size'] > 0) {
        $uploaddir = IMG_PROJ_PATH;
        $uploadfile = $uploaddir . 'homepage-gallery/' . basename($_FILES['gallery_bg']['name']);
        if ($_FILES['gallery_bg']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file($_FILES['gallery_bg']['tmp_name'], $uploadfile)) {
            $result['info'][] = 'Image uploaded successfully.';
          }

          $property_image = NULL;
          if (isset($_FILES['gallery_bg']['name'])) {
            $property_image = $_FILES['gallery_bg']['name'];
          }

          $add_mi = 'UPDATE homepage_gallery SET path = "homepage-gallery/' . $property_image . '"';
          $adding_miq = $mysqli->query($add_mi);
        }
        else {
          $result['info'][] = 'Image is too large.';
        }

      }
    }

    //загрузка фоток галереи
    if (isset($_FILES)) {
      if (isset($_FILES['gallery'])) {
        foreach ($_FILES['gallery']['name'] as $name => $item) {
          if ($_FILES['gallery']['size'][$name] > 0) {
            $uploaddir = IMG_PROJ_PATH;
            $uploadfile = $uploaddir . 'homepage-gallery/' . basename($_FILES['gallery']['name'][$name]);
            if ($_FILES['gallery']['size'][$name] <= $_POST['MAX_FILE_SIZE']) {
              if (move_uploaded_file($_FILES['gallery']['tmp_name'][$name], $uploadfile)) {
                $result['info'][] = 'Image uploaded successfully.';
              }

              $gallery = NULL;
              if (isset($_FILES['gallery']['name'][$name])) {
                $gallery = $_FILES['gallery']['name'][$name];
              }

              $curr_id = NULL;
              if (!empty($_POST)) {
                if (!empty($_POST['gallery'])) {
                  if (!empty($_POST['gallery'][$name])) {
                    $curr_id = $_POST['gallery'][$name];
                  }
                }
              }

              $curr_is_on_main = '0';
              if (!empty($_POST)) {
                if (!empty($_POST['is-on-main-gallery'])) {
                  if (!empty($_POST['is-on-main-gallery'][$name])) {
                    if ($_POST['is-on-main-gallery'][$name] == 'on') {
                      $curr_is_on_main = '1';
                    }
                  }
                }
              }

              $curr_title = '';
              if (!empty($_POST)) {
                if (!empty($_POST['img-title-main-gallery'])) {
                  if (!empty($_POST['img-title-main-gallery'][$name])) {
                    $curr_title = $_POST['img-title-main-gallery'][$name];

                  }
                }
              }

              $add_mi = 'UPDATE gallery-images ' .
                'SET path = "homepage-gallery/' . $gallery . '", ' .
                'panel-displaying = "' . $curr_is_on_main . '", ' .
                'alt = "' . $curr_title . '", ' .
                'title = "' . $curr_title . '" ' .
                'WHERE id="' . $curr_id . '"';
              $adding_miq = $mysqli->query($add_mi);


            }
            else {
              $result['info'][] = 'Image is too large.';
            }
          }
        }
      }
    }


    $header_title = '';
    if (isset($_POST['header_title'])) {
      $header_title = $_POST['header_title'];
    }

    $philosophy_text = '';
    if (isset($_POST['philosophy_text'])) {
      $philosophy_text = $_POST['philosophy_text'];
    }

    $property_title = '';
    if (isset($_POST['property_title'])) {
      $property_title = $_POST['property_title'];
    }

    if (isset($_POST['property'])) {
      foreach ($_POST['property'] as $id => $item) {
        if (isset($_POST['property'][$id])) {
          $sel = 'SELECT id FROM header_properties WHERE id=' . $item['id'];
          $query = $mysqli->query($sel);

          $isId = mysqli_fetch_assoc($query);

          if ($isId['id'] == NULL) {
            $add_mi = 'INSERT INTO header_properties (id, title, description) VALUES ("' . $item['id'] . '", "' . $item['title'] . '", "' . $item['description'] . '")';
          }
          else {
            if ($item['title'] == '' and $item['description'] == '') {
              $del_file = "SELECT icon FROM header_properties WHERE id = " . $id . " ";
              $filename = mysqli_fetch_assoc($mysqli->query($del_file));

              if (file_exists(IMG_PROJ_PATH . $filename['icon'])) {
                unlink(IMG_PROJ_PATH . $filename['icon']);
              }
              $add_mi = "DELETE FROM header_properties  WHERE id='" . $item['id'] . "'";
            }
            else {
              $add_mi = "UPDATE header_properties SET title = '" . $item['title'] . "', description = '" . $item['description'] . "' WHERE id = '" . $item['id'] . "' ";
            }
          }

          $adding_info_query = $mysqli->query($add_mi);
        }
      }
    }


    //собственно запрос
    $add_q = "UPDATE homepage_info " .
      "SET header_title = '" . $header_title . "', " .
      "property_title = '" . $property_title . "' WHERE id=1";

    $adding_info_query = $mysqli->query($add_q);


    $add_q = "UPDATE philosophy " .
      "SET text = '" . $philosophy_text . "' WHERE id=1";

    $adding_info_query = $mysqli->query($add_q);

    //if ($adding_info_query) {
    $result['res'] = TRUE;
    /* }
     else {
       $result['res'] = FALSE;
     }*/

    return $result;
  }
}
