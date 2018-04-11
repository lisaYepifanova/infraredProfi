<main>


   <?php
  $lang = getLanguage();


  if ($lang == '2') {
    echo '<h1 class="page-header container text-capitalize left-padding">EDIT MEMBER</h1>';
  }
  else {
    echo '<h1 class="page-header container text-capitalize left-padding">EDIT MITGLIED</h1>';
  }

  ?>


  <div class="container left-padding">
    <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
    <form enctype="multipart/form-data" role="form" action="" method="post">
     <div class="info-wrapper box-mid-margin container left-padding">
        <label for="edit-name">Name</label>
        <input type="text" name="name"
               id="edit-name" value="<?php echo $data['add']['name']; ?>">

      </div>

      <div class="info-wrapper box-mid-margin container left-padding">
          <textarea name="info"
                    class="editor-area">
            <?php echo $data['add']['info']; ?>
          </textarea>
      </div>
      <div class="btn-wrapper container box-mid-margin left-padding">
        <button class="btn" type="submit">SAVE</button>
      </div>
    </form>
  </div>
</main>
