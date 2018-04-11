<?php

class Model_Login extends Model
{
    public function empty_data()
    {
         $login = '';
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
        }

        $pass = '';
        if (isset($_POST['pass'])) {
            $pass = $_POST['pass'];
        }

        if ($login == "" and $pass == "") {
            return true;
        } else {
            return false;
        }
    }

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

        $qs = "SELECT id, pass FROM users WHERE login='".$login."'";
        $q = $mysqli->query($qs);
        if ($q) {
            $querys = mysqli_fetch_assoc($q);
        }


        $res = false;
        if (isset($querys)) {
            if (password_verify($pass, $querys['pass'])) {
            //if ($pass == $querys['pass']) {
                $res = true;

                $pass = $querys['pass'];


                auth($login, $pass);
            }
        }

        return $res;
    }

    public function get_data()
    {
        include 'application/connection.php';

        $true_data = $this->check_data();
        $empty_data = $this->empty_data();

        $res['iscorrect'] = $true_data || $empty_data;

        return $res;
    }
}
