<?php

class Model_User extends Model
{
    public function get_data()
    {
        include 'application/connection.php';

        $user_id = getID();

        $query = $mysqli->query(
          "SELECT photo FROM users WHERE id='".$user_id."'"
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $photoq = $r;
            }
        }

        $photo = $photoq['photo'];
        $res['photo']['path'] = IMAGEPATH.'users/'.$photo;
        $res['photo']['name'] = 'user photo';



        $query = $mysqli->query(
          "SELECT login, uname, surname, phone, email, address, bank_account FROM users WHERE id=".$user_id
        );

        if ($query) {
            $r = mysqli_fetch_assoc($query);
            foreach ($r as $key => $value) {
                if ($key == 'uname') {
                    $item['key'] = 'name';
                } else {
                    $item['key'] = $key;
                }

                $item['value'] = $value;
                $res['user_info'][] = $item;
            }
        }


        $query = $mysqli->query(
          "SELECT roleid FROM users WHERE id='".$user_id."'"
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $role_id = $r;
            }
        }

        $query = $mysqli->query(
          "SELECT role FROM user_role WHERE id=".$role_id['roleid']
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $role = $r;
            }
        }
        $res['user_info']['role']['value'] = $role['role'];
        $res['user_info']['role']['key'] = 'role';

        $query = $mysqli->query(
          "SELECT bundeslandid FROM users WHERE id='".$user_id."'"
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $bund_id = $r;
            }
        }

        $query = $mysqli->query(
          "SELECT name FROM bundesland WHERE id=".$bund_id['bundeslandid']
        );

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $bund = $r;
            }
        }
        $res['user_info']['bund']['value'] = $bund['name'];
        $res['user_info']['bund']['key'] = 'bundesland';

        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='list'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $res['list_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $res['list_icon']['name'] = $add_path['name'];

        ///
        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='order'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $res['order_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $res['order_icon']['name'] = $add_path['name'];

        ///
        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='edit'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $res['edit_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $res['edit_icon']['name'] = $add_path['name'];

        ///
        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='logout'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $res['logout_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $res['logout_icon']['name'] = $add_path['name'];

        ///
        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='settings'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $res['settings_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $res['settings_icon']['name'] = $add_path['name'];


        return $res;
    }

    public function edit_data($arg)
    {
        include 'application/connection.php';

        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='list'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $res['list_page']['list_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
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
          "SELECT * FROM users WHERE login='".$arg."'"
        );
        if ($main_info_query) {
            while ($r = mysqli_fetch_assoc($main_info_query)) {
                $res['main_info'] = $r;
            }
        }

        return $res;
    }

    public function update_data()
    {
        include 'application/connection.php';

        $img_result = true;
        $form_result = false;

        $result['res'] = false;

        if (isset($_FILES)) {
            $uploaddir = '/home/lizabeth/PhpstormProjects/heatingTech/img/users/';
            $uploadfile = $uploaddir.time().basename($_FILES['photo']['name']);
            if ($_FILES['photo']['size'] <= $_POST['MAX_FILE_SIZE']) {
                if (move_uploaded_file(
                  $_FILES['photo']['tmp_name'],
                  $uploadfile
                )) {
                    $img_result = true;
                    $result['info'][] = 'Image uploaded successfully.';
                }
            } else {
                $img_result = false;
                $result['info'][] = 'Image is too large.';
            }
        }

        $photo = null;
        if (isset($_FILES)) {
            if ($_FILES['photo']['size'] !== 0) {
                $photo = time().basename($_FILES['photo']['name']);

                $add_p = 'UPDATE users SET photo="'.$photo.'" WHERE id = "'.getID().'"';

                $adding_user_query = $mysqli->query($add_p);

                if (!$adding_user_query) {
                    $form_result = false;
                }
            }

        } else {
            $form_result = true;
        }


        $login_query = 'SELECT login FROM users WHERE login="'.$_POST['login'].'" AND id != '.$_POST['id'];
        $login_user_query = $mysqli->query($login_query);
        $unique = true;
        if ($login_user_query->num_rows > 0) {
            $form_result = false;
            $unique = false;
            $result['info'][] = 'This login '.$_POST['login'].' is already in use';
        }

        if (($_POST['login'] !== '') and $unique) {
            $form_result = true;


            $login = null;
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }


            $pass = null;
            if (isset($_POST['pass'])) {
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            }

            $name = null;
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            }

            $surname = null;
            if (isset($_POST['surname'])) {
                $surname = $_POST['surname'];
            }

            $phone = null;
            if (isset($_POST['telephone'])) {
                $phone = $_POST['telephone'];
            }

            $email = null;
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            $address = null;
            if (isset($_POST['address'])) {
                $address = $_POST['address'];
            }

            $bank_account = null;
            if (isset($_POST['bank_account'])) {
                $bank_account = $_POST['bank_account'];
            }

            $bundesland = null;
            if (isset($_POST['bundesland'])) {
                $bundesland = $_POST['bundesland'];
            }

            $add_q = 'UPDATE users SET 
                        login = "'.$login.'",
                        pass = "'.$pass.'",
                        uname = "'.$name.'",
                        surname = "'.$surname.'",
                        email = "'.$email.'",
                        phone = "'.$phone.'",
                        bundeslandid = "'.$bundesland.'",
                        bank_account = "'.$bank_account.'",
                        address = "'.$address.'"
                        WHERE id = "'.getID().'"
                          ';

            $adding_user_query = $mysqli->query($add_q);

            if (!$adding_user_query) {
                $form_result = false;
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

        if ($img_result and $form_result) {
            $result['res'] = true;
        }

        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='list'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $result['list_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $result['list_icon']['name'] = $add_path['name'];

        return $result;
    }
}
