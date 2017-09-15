<?php

class Model_Handler_liste extends Model
{
    public function save_data()
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
            }

        }

        if (($_POST['login'] !== '') and ($_POST['pass'] !== '')) {
            $form_result = true;


            $login = null;
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }

            $pass = null;
            if (isset($_POST['pass'])) {
                $pass = $_POST['pass'];
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

            $role = '2';
            if (isset($_POST['role'])) {
                $role = $_POST['role'];
            }

            $add_q = 'INSERT INTO users (login, pass, photo, uname, surname, email, phone, bundeslandid, bank_account, roleid, address) values ("'.$login.'", "'.$pass.'", "'.$photo.'", "'.$name.'", "'.$surname.'", "'.$email.'", "'.$phone.'", "'.$bundesland.'", "'.$bank_account.'", "'.$role.'", "'.$address.'" )';

            $adding_user_query = $mysqli->query($add_q);

            if (!$adding_user_query) {
                $form_result = false;
            }

        } else {
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

    public function add_handler()
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

        return $res;

    }

    public function get_data()
    {
        include 'application/connection.php';

        $role_query = $mysqli->query(
          "SELECT * FROM user_role WHERE role NOT IN ('superadmin')"
        );
        if ($role_query) {
            while ($role = mysqli_fetch_assoc($role_query)) {

                $query = $mysqli->query(
                  "SELECT * FROM users WHERE roleid=".$role['id']
                );

                $res_role = '';

                if ($query) {
                    while ($r = mysqli_fetch_assoc($query)) {

                        $bquery = $mysqli->query(
                          "SELECT name FROM bundesland WHERE id=".$r['bundeslandid']
                        );

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

        $res['list_page']['add_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $res['list_page']['add_icon']['name'] = $add_path['name'];

        return $res;
    }

    public function del_data()
    {
        include 'application/connection.php';

        $add_path_q = $mysqli->query(
          "SELECT * FROM list_page_icons WHERE name='list'"
        );

        if ($add_path_q) {
            $add_path = mysqli_fetch_assoc($add_path_q);
        }

        $res['list_icon']['path'] = IMAGEPATH.'user_pages/'.$add_path['path'];
        $res['list_icon']['name'] = $add_path['name'];


        $uid = '';
        if (isset($_POST)) {
            if (isset($_POST['uid'])) {
                $res['uid'] = $_POST['uid'];
                $res['uname'] = $_POST['uname'];
                $res['surname'] = $_POST['surname'];

                $delq = 'DELETE FROM users WHERE id='.$res['uid'];

                $del_user_query = $mysqli->query($delq);


                if ($del_user_query) {
                    $res['query'] = 'ok';
                } else {
                    $res['query'] = '$mysqli->error';
                }
            } else {
                $res['query'] = 'no_user';
            }
        } else {
            $res['query'] = 'no_query';
        }

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

                $add_p = 'UPDATE users SET photo = "'.$photo.'"';

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

        if (($_POST['login'] !== '') and ($_POST['pass'] !== '') and $unique) {
            $form_result = true;


            $login = null;
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }


            $pass = null;
            if (isset($_POST['pass'])) {
                $pass = $_POST['pass'];
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

            $role = null;
            if (isset($_POST['role'])) {
                $role = $_POST['role'];
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
                        roleid = "'.$role.'",
                        address = "'.$address.'"
                        WHERE id = "'.$_POST['id'].'"
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
