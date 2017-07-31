<?php

class Model_Main extends Model
{
    public function get_data()
    {
        include 'application/connection.php';

        $query = $mysqli->query("SELECT * FROM homepage_info");

        if ($query) {
            $r = mysqli_fetch_assoc($query);
            $res['header_title'] = $r['header_title'];
            $res['property_title'] = $r['property_title'];
            $res['property_image'] = $r['property_image'];
        }

        $query = $mysqli->query("SELECT * FROM header_slider");

        if ($query) {
            while($r = mysqli_fetch_assoc($query)) {
                $res['header_slider'][] = $r;
            }
        }

        $query = $mysqli->query("SELECT * FROM header_properties");

        if ($query) {
            while($r = mysqli_fetch_assoc($query)) {
                $res['property_items'][] = $r;
            }
        }

        $query = $mysqli->query("SELECT * FROM gallery_images");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['gallery'][] = $r;
            }
        }

        $query = $mysqli->query("SELECT * FROM gallery_bg");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['gallery_bg'] = $r;
            }
        }

        return $res;
    }
}
