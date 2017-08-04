<?php
class Model_Download extends Model
{
     public function get_data()
    {
        include 'application/connection.php';
        $query = $mysqli->query("SELECT * FROM documents");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['documents'][] = $r;
            }
        }

        $query = $mysqli->query("SELECT * FROM document_categories");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['categories'][] = $r;
            }
        }

        return $res;
    }
}
