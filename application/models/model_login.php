<?php

class Model_Login extends Model
{
    public function check_data()
    {
        include 'application/connection.php';

        $login = '';
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
        }

        $pass = '';
        if (isset($_POST['pass'])) {
            $pass = $_POST['pass'];
        }

        $query = mysqli_fetch_assoc($mysqli->query("SELECT pass FROM users WHERE login=".$login));


        $res = false;
        if($query['pass'] == $pass) {
            $res = true;
        }

        return $res;
    }

    public function get_data()
    {
        include 'application/connection.php';

        $res['iscorrect'] = $this->check_data();

        /* $query = $mysqli->query("SELECT * FROM contact_page");

         if ($query) {
             while ($r = mysqli_fetch_assoc($query)) {
                 $res = $r;
             }
         }*/




        return $res;
    }
}
