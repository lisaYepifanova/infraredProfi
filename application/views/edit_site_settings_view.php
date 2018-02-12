<main>
  <h1 class="page-header container text-capitalize left-padding">EDIT SITE SETTINGS</h1>
  <div class="container left-padding">
    <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
      <h3>Links to page edition forms</h3>
      <form enctype="multipart/form-data" role="form" action="" method="post">
      <?php

      foreach ($data['add'] as $id=>$row) { ?>
        <div class="edition-site-settings-link-item box-small-mb">

          <input type="hidden" name="link[<?php echo $row['id']; ?>][id]" value="<?php echo $row['id']; ?>" >
          <label for="link-name-<?php echo $row['id']; ?>">Name: </label>
          <input type="text"
                 name="link[<?php echo $row['id']; ?>][name]"
                 id="link-name-<?php echo $row['id']; ?>"
                 value="<?php echo $row['link_name']; ?>">

          <label for="link-path-<?php echo $row['id']; ?>">Link: </label>
          <input type="text"
                 name="link[<?php echo $row['id']; ?>][path]"
                 id="link-path-<?php echo $row['id']; ?>"
                 value="<?php echo $row['link_path']; ?>">
        </div>
      <?php
      }
      echo '<a class="glyphicon glyphicon-plus add-new-site-settings-link-button">Add new link</a>';
      ?>
        <button class="btn" type="submit">SAVE</button>
      </form>
    </div>
</main>