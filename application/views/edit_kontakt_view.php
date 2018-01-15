<main>
  <h1 class="page-header container text-capitalize left-padding">EDIT KONTAKT</h1>

  <div class="container left-padding">
     <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
    <form enctype="multipart/form-data" role="form" action="" method="post">
      <div class="info-wrapper box-mid-margin  ">
        <label>Kontakt info</label>
        <textarea name="info"
                    class="editor-area">
            <?php echo $data['add']['info']; ?>
          </textarea>
      </div>


      <div class="info-wrapper box-mid-margin ">
        <label>Map link </label>
          <div>
            <textarea rows="7" name="map" class="input-map" value="">
            <?php echo $data['add']['map']; ?>
            </textarea>
          </div>

      </div>
      <div class="btn-wrapper  box-mid-margin ">
        <button class="btn" type="submit">SAVE</button>
      </div>
    </form>
  </div>
</main>
