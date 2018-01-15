<main>
  <h1 class="page-header container text-capitalize left-padding">EDIT SITE SETTINGS</h1>
  <div class="container left-padding">
    <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
      <h3>Links to page edition forms</h3>
      <form enctype="multipart/form-data" role="form" action="" method="post">
      <?php foreach ($data as $id=>$row) { ?>
        <div class="edition-link-item box-small-mb">
          <a href="<?php echo $row['link_path']; ?>">EDIT <?php echo $row['link_name']; ?></a>
          <label for="link-name-<?php echo $id; ?>">Name: </label>
          <input type="text"
                 name="link-name-<?php echo $id; ?>"
                 id="link-name-<?php echo $id; ?>"
                 value="<?php echo $row['link_name']; ?>">

          <label for="link-path-<?php echo $id; ?>">Link: </label>
          <input type="text"
                 name="link-path-<?php echo $id; ?>"
                 id="link-path-<?php echo $id; ?>"
                 value="<?php echo $row['link_path']; ?>">
        </div>
      <?php } ?>
        <button class="btn" type="submit">SAVE</button>
      </form>
    </div>
</main>