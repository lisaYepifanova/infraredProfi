<?php

class Model_Handler_liste extends Model
{
    public function get_data()
    {
        include 'application/connection.php';

        $role_query = $mysqli->query("SELECT * FROM user_role");
        if ($role_query) {
            while ($role = mysqli_fetch_assoc($role_query)) {

                $query = $mysqli->query(
                  "SELECT * FROM users WHERE roleid=".$role['id']
                );

                $res_role = '';

                if ($query) {
                    while ($r = mysqli_fetch_assoc($query)) {
                        $bund = mysqli_fetch_array(
                          $mysqli->query(
                            "SELECT name FROM bundesland WHERE id=".$r['bundeslandid']
                          )
                        );
                        $r['bundesland'] = $bund['name'];
                        $res_role[] = $r;


                    }
                }
                $res_role_item['role'] = $role['role'];
                $res_role_item['items'] = $res_role;
                $res[] = $res_role_item;
            }
        }


        return $res;
    }
}
