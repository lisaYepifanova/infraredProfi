<?php

class Model_Contact extends Model
{
    public function get_data()
    {
        include 'application/connection.php';
        $query = $mysqli->query("SELECT * FROM contact_page");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res = $r;
            }
        }


        $query = $mysqli->query("SELECT * FROM main_contact_page_info");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['main_info'][] = $r['info'];
            }
        }



        return $res;
    }
}