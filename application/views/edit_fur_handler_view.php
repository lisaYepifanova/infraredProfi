<main>


  <form enctype="multipart/form-data" role="form" action="" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="409600"/>
    <h1 class="page-header container hsmall text-capitalize left-padding">
    <input type="text" value="<?php echo  $data['add']['main_info']['title']; ?>" name="title">

  </h1>


    <div class="container">
      <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
    </div>
    <div class="left-padding">
      <?php
      $lang = getLanguage();
      echo '<h3 class=""><textarea name="top_block" class="full-textarea bg-field editor-area">' . $data['add']['main_info']['top_block'] . '</textarea></h3>';
      ?>
    </div>

    <div class="container left-padding">
      <div class="registration-leistungen-wrapper">
        <h3> <?php echo '<textarea name="service_title" class="full-textarea editor-area">' . $data['add']['main_info']['service_title'] . '</textarea>'; ?></h3>


        <label for="service_bg_image">service_bg image:</label>
        <div>
          <img id="imageservice_bg"
               src="<?php echo IMAGEPATH . '' . $data['add']['main_info']['service_bg']; ?>"
               alt=""/>
          <a href="#" class="close-img-service_bg">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="service_bg_image"
               name="service_bg_image">
        <span class="help-block"> Max filesize is 400Kb</span>


        <div class="registration-leistungen-edit">
          <?php
          $ind = 1;
          foreach ($data['add']['services'] as $row) {
            if ($ind == 1) {
              echo '<div class="col-sm-6 left-col">';
            }

            if ($ind == 4) {
              echo '<div class="col-sm-6 right-col">';
            }
            echo '<div class="leistungen-item-edit box-vmargin ">
                  <div class="leistungen-item-img-wrap-edit">
                  <div class="leistungen-item-img-edit">';
            ?>

            <div>
              <img id="<?php echo 'imageservice_' . $row['id'] ?>"
                   src="<?php echo IMAGEPATH . '' . $row['icon']; ?>"
                   alt=""/>
              <a href="#" class="<?php echo 'close-img-service_' . $row['id'] ?>">
                <button type="button">Reset</button>
              </a>
            </div>

            <input type="file" class="form-control"
                   id="<?php echo 'service_image_' . $row['id'] ?>"
                   name="<?php echo 'service_image_' . $row['id'] ?>">
            <span class="help-block"> Max filesize is 400Kb</span>


            <?php
            echo '</div></div>';
            echo '<div class="leistungen-item-description-edit ">';
            if($lang==1) {
              echo '<textarea class="editor-area" name="service_description_' . $row['id'] . '">' . $row['description'] . '</textarea>';
            }else if($lang==2) {
              echo '<textarea class="editor-area" name="service_eng_description_' . $row['id'] . '">' . $row['eng_description'] . '</textarea>';
            }


            echo '</div></div>';

            if ($ind == 3) {
              echo '</div>';
            }

            if ($ind == 6) {
              echo '</div>';
            }

            $ind += 1;
          }
          ?>
        </div>
      </div>

      <div class="registration-description">

        <?php echo '<textarea name="description" class="full-textarea editor-area">' . $data['add']['main_info']['description'] . '</textarea>'; ?>
      </div>
    </div>

    <div class="registration-properties">
      <div class="registration-properties-row">
        <div class="properties-side left-side left-side-edit">

           <div>
                <img id="<?php echo 'imageangbg'; ?>"
                     src="<?php echo IMAGEPATH . '' . $data['add']['main_info']['angebot_bg']; ?>"
                     alt=""/>
                <a href="#" class="<?php echo 'close-img-angbg' ;?>">
                  <button type="button">Reset</button>
                </a>
              </div>

              <input type="file" class="form-control" id="<?php echo 'service_angbg' ;?>"
                     name="<?php echo 'ang_imagebg' ;?>">
              <span class="help-block"> Max filesize is 400Kb</span>


        </div>
        <div class="properties-side right-side-wrapper">
          <?php
          echo '<h3 class="property-title registration-property-title left-padding">
<textarea name="angebot_title" class="full-textarea bg-field" >' . $data['add']['main_info']['angebot_title'] . '
</textarea></h3>';
          ?>
          <div class="properties-side  right-side properties-right-side-edit">
<?php echo '<input type="hidden" name="max_id_angebot" id="max_id_angebot" value="' . $data['add']['max_id_angebot'] . '">'; ?>
            <?php
            foreach ($data['add']['angebot'] as $row) {
              echo '<div class="property-item property-item' . $row['id'] . '">
              <div class="property-item-image"></div>';

              ?>

              <div>
                <img id="<?php echo 'imageang'.$row['id'] ;?>"
                     src="<?php echo IMAGEPATH . '' . $row['icon']; ?>"
                     alt=""/>
                <a href="#" class="<?php echo 'close-img-ang_'.$row['id'] ;?>">
                  <button type="button">Reset</button>
                </a>
              </div>

              <input type="file" class="form-control" id="<?php echo 'service_ang'.$row['id'] ;?>"
                     name="<?php echo 'ang_image'.$row['id'] ;?>">
              <span class="help-block"> Max filesize is 400Kb</span>


              <?php

                if($lang==1) {
                   echo '
              
              <h4 class="property-item-title"><textarea class="bg-field full-textarea" name="'.'item-title_'.$row['id'].'">' . $row['title'] . '</textarea></h4>
              <p class="property-item-description"><textarea class="bg-field full-textarea" name="'.'item-desc_'.$row['id'].'">' . $row['description'] . '</textarea></p>';

                } else if($lang==2) {
                   echo '
              
              <h4 class="property-item-title"><textarea class="bg-field full-textarea" name="'.'eng_item-title_'.$row['id'].'">' . $row['eng_title'] . '</textarea></h4>
              <p class="property-item-description"><textarea class="bg-field full-textarea" name="'.'eng_item-desc_'.$row['id'].'">' . $row['eng_description'] . '</textarea></p>';

                }
              echo ' </div>';

            }

            echo '<a class="glyphicon glyphicon-plus add-new-angebot-button">Add new item</a>';
            ?>

          </div>
        </div>
      </div>
    </div>

    <div class="registration-form container left-padding box-same-vmargin">
      <div class="registration-form-title registration-form-title-edit text-center">
        <label>Form title</label>
        <?php echo '<textarea name="form_title" class="full-textarea editor-area">' . $data['add']['main_info']['form_title'] . '</textarea>'; ?>
      </div>

      <div class="registration-form-title registration-form-title-edit text-center">
        <label>Form</label>
        <?php echo '<textarea name="form_title" class="full-textarea editor-area">' . $data['add']['main_info']['form'] . '</textarea>'; ?>
      </div>

    </div>
    <div class="btn-wrapper  box-mid-margin container left-padding">
      <button class="btn" type="submit">SAVE</button>
    </div>
  </form>
</main>
