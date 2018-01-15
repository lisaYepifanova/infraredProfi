<div class="philosophy container box-vmargin left-padding">
  <h3 class="philosophy-title text-center">PHILOSOPHIE</h3>

  <?php
  include 'application/connection.php';
  $q = "SELECT * FROM philosophy";
  $query = $mysqli->query($q);

  if ($query) {
    while ($r = mysqli_fetch_assoc($query)) {
      echo '<textarea name="philosophy_text" class="full-textarea editor-area">' . $r['text'] . '</textarea>';
    }
  }

  $q = "SELECT sign_image FROM homepage_info";
  $query = $mysqli->query($q);

  if ($query) {
    while ($r = mysqli_fetch_assoc($query)) {
      echo '<div class="sign-wrapper text-center">';
      ?>

      <label for="sign_image">Sign image:</label>
      <div>
        <img id="imagesign_image"
             src="<?php echo IMAGEPATH . '' . $r['sign_image']; ?>"
             alt=""/>
        <a href="#" class="close-sign_image">
          <button type="button">Reset</button>
        </a>
      </div>

      <input type="file" class="form-control" id="sign_image"
             name="sign_image"
             value=<?php echo $r['sign_image']; ?>>
      <span class="help-block"> Max filesize is 400Kb</span>

      <?php
    }
  }
  ?>

</div>
</div>
