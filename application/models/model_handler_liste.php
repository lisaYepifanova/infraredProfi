<?php


class Model_Handler_liste extends Model {
  public function save_data() {
    include 'application/connection.php';
    include 'application/users.php';

    $img_result = TRUE;
    $form_result = FALSE;
    $result['res'] = FALSE;

    if (getRole() == "superadmin" || (getRole() == "admin" && getRoleName($_POST['uid']) == 'handler')) {

      if (isset($_FILES)) {
        $uploaddir = PROJ_PATH . 'img/users/';
        $uploadfile = $uploaddir . time() . basename(
            $_FILES['photo']['name']
          );
        if ($_FILES['photo']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            $uploadfile
          )) {
            $img_result = TRUE;
            $result['info'][] = 'Image uploaded successfully.';
          }
        }
        else {
          $img_result = FALSE;
          $result['info'][] = 'Image is too large.';
        }
      }

      $photo = NULL;
      if (isset($_FILES)) {
        if ($_FILES['photo']['size'] !== 0) {
          $photo = time() . basename($_FILES['photo']['name']);
        }

      }

      if (($_POST['login'] !== '') and ($_POST['pass'] !== '')) {
        $form_result = TRUE;


        $login = NULL;
        if (isset($_POST['login'])) {
          $login = $_POST['login'];
        }

        $pass = NULL;
        if (isset($_POST['pass'])) {
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        }

        $name = NULL;
        if (isset($_POST['name'])) {
          $name = $_POST['name'];
        }

        $surname = NULL;
        if (isset($_POST['surname'])) {
          $surname = $_POST['surname'];
        }

        $phone = NULL;
        if (isset($_POST['telephone'])) {
          $phone = $_POST['telephone'];
        }

        $email = NULL;
        if (isset($_POST['email'])) {
          $email = $_POST['email'];
        }

        $address = NULL;
        if (isset($_POST['address'])) {
          $address = $_POST['address'];
        }

        $bank_account = NULL;
        if (isset($_POST['bank_account'])) {
          $bank_account = $_POST['bank_account'];
        }

        $bundesland = NULL;
        if (isset($_POST['bundesland'])) {
          $bundesland = $_POST['bundesland'];
        }

        $role = '2';
        if (isset($_POST['role'])) {
          $role = $_POST['role'];
        }

        $add_q = 'INSERT INTO users (login, pass, photo, uname, surname, email, phone, bundeslandid, bank_account, roleid, address) values ("' . $login . '", "' . $pass . '", "' . $photo . '", "' . $name . '", "' . $surname . '", "' . $email . '", "' . $phone . '", "' . $bundesland . '", "' . $bank_account . '", "' . $role . '", "' . $address . '" )';

        $adding_user_query = $mysqli->query($add_q);

        if (!$adding_user_query) {
          $form_result = FALSE;
        }

      }
      else {
        if ($_POST['login'] == '') {
          $result['info'][] = 'Login can\'t be blank';
        }

        if ($_POST['pass'] == '') {
          $result['info'][] = 'Password can\'t be blank';
        }
      }
    }

    if ($img_result and $form_result) {
      $result['res'] = TRUE;
    }

    $add_path_q = $mysqli->query(
      "SELECT * FROM list_page_icons WHERE name='list'"
    );

    if ($add_path_q) {
      $add_path = mysqli_fetch_assoc($add_path_q);
    }

    $result['list_icon']['path'] = IMAGEPATH . 'user_pages/' . $add_path['path'];
    $result['list_icon']['name'] = $add_path['name'];

    return $result;
  }

  public function add_handler() {
    include 'application/connection.php';


    $add_path_q = $mysqli->query(
      "SELECT * FROM list_page_icons WHERE name='list'"
    );

    if ($add_path_q) {
      $add_path = mysqli_fetch_assoc($add_path_q);
    }

    $res['list_page']['list_icon']['path'] = IMAGEPATH . 'user_pages/' . $add_path['path'];
    $res['list_page']['list_icon']['name'] = $add_path['name'];

    $query = $mysqli->query(
      "SELECT * FROM bundesland"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bundesland'][] = $r;
      }
    }
    $query = $mysqli->query(
      "SELECT * FROM user_role"
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['roles'][] = $r;
      }
    }

    return $res;

  }

  public function get_data() {
    include 'application/connection.php';

    if (getRole() == "superadmin") {
      $role_query = $mysqli->query(
        "SELECT * FROM user_role WHERE role NOT IN ('superadmin')"
      );
    }
    else {
      $role_query = $mysqli->query(
        "SELECT * FROM user_role WHERE role NOT IN ('superadmin', 'admin')"
      );
    }


    if ($role_query) {
      while ($role = mysqli_fetch_assoc($role_query)) {
        $query = $mysqli->query(
          "SELECT * FROM users WHERE roleid=" . $role['id'] . " AND id NOT IN ('" . getID() . "')"
        );

        $res_role = '';

        if ($query) {
          while ($r = mysqli_fetch_assoc($query)) {


            $bquery = $mysqli->query(
              "SELECT name FROM bundesland WHERE id=" . $r['bundeslandid']
            );

            if ($r['photo'] === '' || $r['photo'] === NULL) {
              $r['photo'] = 'def-user.png';
            }

            if ($bquery) {
              $bund = mysqli_fetch_array($bquery);
            }
            if ($bund) {
              $r['bundesland'] = $bund['name'];
              $res_role[] = $r;
            }


          }


        }
        $res_role_item['role'] = $role['role'];
        $res_role_item['items'] = $res_role;


        $res['user_info'][] = $res_role_item;
      }
    }

    $add_path_q = $mysqli->query(
      "SELECT * FROM list_page_icons WHERE name='add'"
    );

    if ($add_path_q) {
      $add_path = mysqli_fetch_assoc($add_path_q);
    }


    $res['list_page']['add_icon']['path'] = IMAGEPATH . 'user_pages/' . $add_path['path'];
    $res['list_page']['add_icon']['name'] = $add_path['name'];

    return $res;
  }

  public function del_data() {
    include 'application/connection.php';
    include 'application/users.php';

    $add_path_q = $mysqli->query(
      "SELECT * FROM list_page_icons WHERE name='list'"
    );

    if ($add_path_q) {
      $add_path = mysqli_fetch_assoc($add_path_q);
    }

    $res['list_icon']['path'] = IMAGEPATH . 'user_pages/' . $add_path['path'];
    $res['list_icon']['name'] = $add_path['name'];

    $rolename = getRoleName($_POST['uid']);

    $uid = '';
    if (getRole() == 'superadmin' || (getRole() == 'admin' && $rolename == 'handler')
    ) {
      if (isset($_POST)) {
        if (isset($_POST['uid'])) {
          $res['uid'] = $_POST['uid'];
          $res['uname'] = $_POST['uname'];
          $res['surname'] = $_POST['surname'];

          $delq = 'DELETE FROM users WHERE id=' . $res['uid'];

          $del_user_query = $mysqli->query($delq);


          if ($del_user_query) {
            $res['query'] = 'ok';
          }
          else {
            $res['query'] = '$mysqli->error';
          }
        }
        else {
          $res['query'] = 'no_user';
        }
      }
      else {
        $res['query'] = 'no_query';
      }
    }
    else {
      $res['query'] = 'no_permissions';
    }

    return $res;
  }

  public function edit_data($arg) {
    include 'application/connection.php';

    $add_path_q = $mysqli->query(
      "SELECT * FROM list_page_icons WHERE name='list'"
    );

    if ($add_path_q) {
      $add_path = mysqli_fetch_assoc($add_path_q);
    }

    $res['list_page']['list_icon']['path'] = IMAGEPATH . 'user_pages/' . $add_path['path'];
    $res['list_page']['list_icon']['name'] = $add_path['name'];

    $query = $mysqli->query(
      "SELECT * FROM bundesland"
    );
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['bundesland'][] = $r;
      }
    }

    $query = $mysqli->query(
      "SELECT * FROM user_role"
    );
    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['roles'][] = $r;
      }
    }

    $main_info_query = $mysqli->query(
      "SELECT * FROM users WHERE login='" . $arg . "'"
    );
    if ($main_info_query) {
      while ($r = mysqli_fetch_assoc($main_info_query)) {
        $res['main_info'] = $r;
      }
    }

    return $res;
  }

  public function update_data() {
    include 'application/connection.php';

    $img_result = TRUE;
    $form_result = FALSE;

    $result['res'] = FALSE;

    if (getRole() == 'superadmin' || (getRole() == 'admin' && $_POST['role'] == '2')
    ) {
      if (isset($_FILES)) {
        $uploaddir = '/home/lizabeth/PhpstormProjects/heatingTech/img/users/';
        $uploadfile = $uploaddir . time() . basename(
            $_FILES['photo']['name']
          );
        if ($_FILES['photo']['size'] <= $_POST['MAX_FILE_SIZE']) {
          if (move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            $uploadfile
          )) {
            $img_result = TRUE;
            $result['info'][] = 'Image uploaded successfully.';
          }
        }
        else {
          $img_result = FALSE;
          $result['info'][] = 'Image is too large.';
        }
      }

      $photo = NULL;
      if (isset($_FILES)) {
        if ($_FILES['photo']['size'] !== 0) {
          $photo = time() . basename($_FILES['photo']['name']);

          $add_p = 'UPDATE users SET photo = "' . $photo . '" WHERE id="' . $_POST['id'] . '"';

          $adding_user_query = $mysqli->query($add_p);

          if (!$adding_user_query) {
            $form_result = FALSE;
          }
        }

      }
      else {
        $form_result = TRUE;
      }


      $login_query = 'SELECT login FROM users WHERE login="' . $_POST['login'] . '" AND id != ' . $_POST['id'];
      $login_user_query = $mysqli->query($login_query);
      $unique = TRUE;
      if ($login_user_query->num_rows > 0) {
        $form_result = FALSE;
        $unique = FALSE;
        $result['info'][] = 'This login ' . $_POST['login'] . ' is already in use';
      }

      if (($_POST['login'] !== '') /*and ($_POST['pass'] !== '')*/ and $unique) {
        $form_result = TRUE;

        $login = NULL;
        if (isset($_POST['login'])) {
          $login = $_POST['login'];
        }
/*
        $pass = NULL;
        if (isset($_POST['pass'])) {
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        }
*/
        $name = NULL;
        if (isset($_POST['name'])) {
          $name = $_POST['name'];
        }

        $surname = NULL;
        if (isset($_POST['surname'])) {
          $surname = $_POST['surname'];
        }

        $phone = NULL;
        if (isset($_POST['telephone'])) {
          $phone = $_POST['telephone'];
        }

        $email = NULL;
        if (isset($_POST['email'])) {
          $email = $_POST['email'];
        }

        $address = NULL;
        if (isset($_POST['address'])) {
          $address = $_POST['address'];
        }

        $bank_account = NULL;
        if (isset($_POST['bank_account'])) {
          $bank_account = $_POST['bank_account'];
        }

        $bundesland = NULL;
        if (isset($_POST['bundesland'])) {
          $bundesland = $_POST['bundesland'];
        }

        $role = NULL;
        if (isset($_POST['role'])) {
          $role = $_POST['role'];
        }

        $add_q = 'UPDATE users SET 
                        login = "' . $login . '",
                        uname = "' . $name . '",
                        surname = "' . $surname . '",
                        email = "' . $email . '",
                        phone = "' . $phone . '",
                        bundeslandid = "' . $bundesland . '",
                        bank_account = "' . $bank_account . '",
                        roleid = "' . $role . '",
                        address = "' . $address . '"
                        WHERE id = "' . $_POST['id'] . '"
                          ';

        $adding_user_query = $mysqli->query($add_q);

        if (!$adding_user_query) {
          $form_result = FALSE;
        }

        $pass = NULL;
        if (isset($_POST['pass'])) {
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        }

        if ($pass.length() >= 8) {
          $add_qp = 'UPDATE users SET 
                        pass = "' . $pass . '"
                        WHERE id = "' . $_POST['id'] . '"
                          ';

          $adding_user_qp = $mysqli->query($add_qp);

          if (!$adding_user_qp) {
            $form_result = FALSE;
          }
        }

      }
      else {
        if ($_POST['login'] == '') {
          $result['info'][] = 'Login can\'t be blank';
        }

       /* if ($_POST['pass'] == '') {
          $result['info'][] = 'Password can\'t be blank';
        }*/
      }

      if ($img_result and $form_result) {
        $result['res'] = TRUE;
      }

      $add_path_q = $mysqli->query(
        "SELECT * FROM list_page_icons WHERE name='list'"
      );

      if ($add_path_q) {
        $add_path = mysqli_fetch_assoc($add_path_q);
      }

      $result['list_icon']['path'] = IMAGEPATH . 'user_pages/' . $add_path['path'];
      $result['list_icon']['name'] = $add_path['name'];
    }
    else {
      $result['info'][] = 'You do not have a permission to change user roles';
    }

    return $result;
  }
}
