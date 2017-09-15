<?php

class Model_User extends Model
{
    public function get_data()
    {
        include 'application/connection.php';

        $user_id = getID();
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

        return $res;
    }
}
