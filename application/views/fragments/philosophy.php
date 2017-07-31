<div class="philosophy container box-vmargin">
  <h3 class="philosophy-title text-center">PHILOSOPHY</h3>

    <?php
    include 'application/connection.php';
    $q = "SELECT * FROM philosophy";
    $query = $mysqli->query($q);

    if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
            echo '<span class="philosophy-text">'.$r['text'].'</span>';
        }
    }

    $q = "SELECT sign_image FROM homepage_info";
    $query = $mysqli->query($q);

    if ($query) {
        while ($r = mysqli_fetch_assoc($query)) {
            echo '<div class="sign-wrapper text-center">
      <img src="'.IMAGEPATH.$r['sign_image'].'" alt="sign"> </div>';
        }
    }
    ?>

</div>