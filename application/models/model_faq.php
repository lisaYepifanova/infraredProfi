<?php
class Model_Faq extends Model
{
    public function get_data()
    {
        include 'application/connection.php';
        $query = $mysqli->query("SELECT * FROM faq");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res[] = $r;
            }
        }

        return $res;
    }
}
