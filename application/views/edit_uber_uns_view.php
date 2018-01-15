<main class="about-us-page">

  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT "ÜBER UNS"</h1>
  <form enctype="multipart/form-data" role="form" action="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="409600"/>
    <div class="about-us-right-image container box-mid-margin left-padding">
      <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
      <div class="row">
        <div class="about-us-image col-xs-7">


          <label for="photo">Photo:</label>
          <div>
            <img id="imagem"
                 src="<?php echo IMAGEPATH.''.$data['add']['mission_img']; ?>"
                 alt=""/>
            <a href="#" class="close-imgm">
              <button type="button">Reset</button>
            </a>
          </div>
          <input type="file" class="form-control" id="mission_img" name="mission_img"
                 value="<?php echo $data['add']['mission_img']; ?>">
          <span class="help-block"> Max filesize is 400Kb</span>



        </div>
        <div class="about-us-text col-xs-5">
          <h4 class="about-us-text-title">MISSION</h4>
          <textarea name="mission_text" class="editor-area"><?php echo $data['add']['mission_text']; ?></textarea>
        </div>
      </div>
    </div>

    <div class="about-us-left-image container box-mid-margin left-padding">
      <div class="row">
        <div class="about-us-image  col-xs-7">
             <label for="photo">Photo:</label>
          <div>
            <img id="imagev"
                 src="<?php echo IMAGEPATH.''.$data['add']['vision_img']; ?>"
                 alt=""/>
            <a href="#" class="close-imgv">
              <button type="button">Reset</button>
            </a>
          </div>
          <input type="file" class="form-control" id="vision_img" name="vision_img"
                 value=<?php echo $data['add']['vision_img']; ?>>
          <span class="help-block"> Max filesize is 400Kb</span>



      </div>

        <div class="about-us-text  col-xs-5">
          <h4 class="about-us-text-title">VISION</h4>
          <textarea name="vision_text" class="editor-area"><?php echo $data['add']['vision_text']; ?></textarea>
        </div>
    </div>

    <div class="about-us-description-wrapper about-us-description-edit box-mid-margin container ">
      <div class="about-us-description">
        <h4 class="">ÜBER UNS</h4>
        <textarea name="about_us_description"  class="editor-area"><?php echo $data['add']['about_us_description']; ?></textarea>
      </div>
    </div>

    <div class="btn-wrapper container box-mid-margin left-padding">
      <button class="btn" type="submit">SAVE</button>
    </div>
  </form>
</main>
