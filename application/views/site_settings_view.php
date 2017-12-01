<main>
  <h1 class="page-header container text-capitalize left-padding">SITE SETTINGS</h1>
  <div class="container left-padding">

    <div class="edition-form-links box-small-mb">
      <h3>Links to page edition forms</h3>
      <?php foreach ($data as $row) { ?>
        <div class="edition-link-item">
          <a href="<?php echo $row['link_path']; ?>">EDIT <?php echo $row['link_name']; ?></a>
        </div>
      <?php } ?>
    </div>

    <h4>
      <a href="edit-default-info/">EDIT DEFAULT INFO</a>
    </h4>
  </div>

</main>