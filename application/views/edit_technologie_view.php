<main>

  <h1 class="page-header container hsmall text-capitalize left-padding">TECHNOLOGIE</h1>

  <div class="container left-padding">
    <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="<?php echo IMAGEPATH; ?>user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>

    <form enctype="multipart/form-data" role="form" action="" method="post">
      <div class="technology-description box-mid-margin">
        <input type="hidden" name="MAX_FILE_SIZE" value="409600"/>
        <label>Description (before)</label>
        <?php
        echo '<textarea name="description_before" class="description-before-items editor-area">' . $data['add']['description_before'] . '</textarea>';
        ?>
      </div>

      <div class="description-img-wrapper box-mid-margin text-center">

        <label for="description_image">Description photo:</label>
        <div>
          <img id="imaged"
               src="<?php echo IMAGEPATH . '' . $data['add']['description_image']; ?>"
               alt=""/>
          <a href="#" class="close-img-description">
            <button type="button">Reset</button>
          </a>
        </div>
        <input type="file" class="form-control" id="description_image"
               name="description_image"
               value=<?php echo $data['add']['description_image']; ?>>
        <span class="help-block"> Max filesize is 400Kb</span>

      </div>


      <div class="technology-description box-mid-margin">
        <label>Description (after)</label>
        <?php
        echo '<textarea name="description_after" class="description-after-items editor-area">' . $data['add']['description_after'] . '</textarea>';
        ?>
      </div>


  </div>
  <div class="description-img-comparison-wrapper ">
    <div
        class="description-img-comparison box-mid-margin text-center container left-padding">
      <?php
      /*first item*/
      echo '<div class="row">';

      echo '<div class="comparison-title col-sm-12">
<h3 class="comparison-title comparison-title-left col-xs-12 col-sm-6">
<input name="infra_title" class="input-title" value="' . $data['add']['infra_title'] . '"></h3>
</div>';

      echo '</div><div class="row comparison-row">';
      /*image*/
      ?>

      <div class="comparison-img col-sm-6">

        <label for="description_image">Infra image:</label>
        <div>
          <img id="imagecomparison_infra"
               src="<?php echo IMAGEPATH . '' . $data['add']['comparison_infra']; ?>"
               alt=""/>
          <a href="#" class="close-img-comparison_infra">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="comparison_infra_image"
               name="comparison_infra_image"
               value=<?php echo $data['add']['comparison_infra']; ?>>
        <span class="help-block"> Max filesize is 400Kb</span>


        <?php
        echo '</div>';

        /*text*/
        echo '<div class="comparison-text-wrapper  comparison-wrapper-1 col-sm-6">
                    <label for="infra_text">Infra text:</label>
                    <textarea name="infra_text" class="comparison-text  editor-area">' . $data['add']['infra_text'] . '</textarea>
                   </div>';
        echo '</div>';

        /*second item*/
        echo '<div class="row ">';

        echo '<div class="comparison-title col-sm-12">
<h3 class="comparison-title comparison-title-right col-xs-12 col-sm-6">
<input name="convect_title" class="input-title" value="' . $data['add']['convect_title'] . '"></h3></div>';

        echo '</div><div class="row comparison-row">';
        /*image*/
        echo '<div class="comparison-img col-sm-6">';
?>

        <label for="convect_image">Convection image:</label>
        <div>
          <img id="imagecomparison_convect"
               src="<?php echo IMAGEPATH . '' . $data['add']['comparison_convect']; ?>"
               alt=""/>
          <a href="#" class="close-img-comparison_convect">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="comparison_convect_image"
               name="comparison_convect_image"
               value=<?php echo $data['add']['comparison_convect']; ?>>
        <span class="help-block"> Max filesize is 400Kb</span>

  <?php
        echo '</div>';
        /*text*/
        echo '<div class="comparison-text-wrapper comparison-wrapper-2 col-sm-6">
                    <label for="convect_text">Convection text:</label>
                    <textarea name="convect_text" class="comparison-text  editor-area">' . $data['add']['convect_text'] . '</textarea>';


        echo '</div>';

        ?>

      </div>
    </div>
    <div class="container left-padding">
      <h3 class="description-scheme-title text-center">
        <?php
        echo '<input name="scheme_title" class="input-title" value="' . $data['add']['scheme_title'] . '">';
        ?>
        </h3>
      <div class="description-img-scheme box-mid-margin text-center">
        <?php
        echo '<div class="convect-house-wrapper col-sm-6">';
        echo '<h3 class="convect-house-title"><textarea name="convect_house_title" class="input-title"> ' . $data['add']['convect_house_title'] . '</textarea>
</h3>';
        ?>

         <label for="convect_house_image">Convection image:</label>
        <div>
          <img id="imageconvect_house_image"
               src="<?php echo IMAGEPATH . '' . $data['add']['convect_house_image']; ?>"
               alt=""/>
          <a href="#" class="close-img-convect_house_image">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="convect_house_image"
               name="convect_house_image"
               value=<?php echo $data['add']['convect_house_image']; ?>>
        <span class="help-block"> Max filesize is 400Kb</span>

        <?php
        echo '<div class="text-center house-description comparison-text-wrapper">
<textarea class=" editor-area" name="convect_house_description">' . $data['add']['convect_house_description'] . '</textarea>
</div></div>';
        echo '</div>';

        echo '<div class="infrared-house-wrapper col-sm-6 text-center ">';
        echo '
<h3 class="infra-house-title"><textarea name="infra_house_title" class="input-title">' . $data['add']['infra_house_title'] . '</textarea> 
</h3>';
        ?>

        <label for="infra_house_image">Infra image:</label>
        <div>
          <img id="imageinfra_house_image"
               src="<?php echo IMAGEPATH . '' . $data['add']['infra_house_image']; ?>"
               alt=""/>
          <a href="#" class="close-img-infra_house_image">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="infra_house_image"
               name="infra_house_image"
               value=<?php echo $data['add']['infra_house_image']; ?>>
        <span class="help-block"> Max filesize is 400Kb</span>


        <?php
        echo '<div class=" house-description comparison-text-wrapper">
<textarea class=" editor-area" name="infra_house_description">' . $data['add']['infra_house_description'] . '</textarea>
</div></div>';
        echo '</div>';
        ?>
      </div>

      <div class="btn-wrapper  box-mid-margin container left-padding">
        <button class="btn" type="submit">SAVE</button>
      </div>
      </form>
    </div>

</main>
