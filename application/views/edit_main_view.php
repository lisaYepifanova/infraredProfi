<main>

  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT MAIN PAGE</h1>
  <form enctype="multipart/form-data" method="post">
    <?php echo '<input type="hidden" name="max_prop_id" id="max_prop_id" value="'.$data['add']['max_prop_id'].'">'; ?>
<input type="hidden" name="MAX_FILE_SIZE" value="409600"/>
    <div class="homepage-header container left-padding">
      <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="<?php echo IMAGEPATH; ?>user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
      <div class="homepage-carousel ">
        <h4 class="box-mid-margin">Carousel images</h4>
        <?php

        foreach ($data['add']['header_slider'] as $id=>$row) {
          echo '<div class="item-edit">
        <div class="carousel-img-ed carousel-image-edit' . $id. '">';
          ?>

          <div class="prev-image">
            <img id="imagecarousel_image_<?php echo $id; ?>"
                 src="<?php echo IMAGEPATH . '' . $row['img']; ?>"
                 alt=""/>
            <div id="close-carousel_image_<?php echo $id; ?>">
              <button type="button">Reset</button>
            </div>
          </div>

          <input type="file" class="form-control"
                 id="carousel_image_<?php echo $id; ?>"
                 name="carousel_image[carousel_image_<?php echo $id; ?>]"
          >
          <span class="help-block"> Max filesize is 400Kb</span>
          <input type="hidden"
                 name="carousel_image[carousel_image_<?php echo $id; ?>]"
                 value="<?php echo $id; ?>">

          <?php
          echo '</div> </div>';
        }
        ?>

      </div>

      <!-- homepage titile -->
      <div class="">
        <h2 class="homepage-header-title">
          <textarea name="header_title"
                    class="full-textarea editor-area">
        <?php echo $data['add']['header_title']; ?>
          </textarea>

        </h2>
      </div>
    </div>


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
      echo '<div class="sign-wrapper text-center box-s-mg-top">';
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


    <div class="homepage-properties homepage-properties-edit">
      <div class="homepage-properties-row ">
        <div class="properties-side left-side left-side-edit">
          <label for="property_image">Property image:</label>
          <div>
            <img id="imageproperty_image"
                 src="<?php echo IMAGEPATH . '' . $data['add']['property_image']; ?>"
                 alt=""/>
            <div class="close-property_image">
              <button type="button">Reset</button>
            </div>
          </div>

          <input type="file" class="form-control" id="property_image"
                 name="property_image">
          <span class="help-block"> Max filesize is 400Kb</span>
        </div>


        <?php
        echo '<h3 class="property-title "><input class="full-textarea" name="property_title" type="text" value="' . $data['add']['property_title'] . '"></h3>';
        ?>
        <div class="properties-side right-side ">

          <?php
          foreach ($data['add']['property_items'] as $row) {
            echo '<div class="property-item property-item_' . $row['id'] . '">
              <div class="property-item-image" style="background-image: url(' . IMAGEPATH . $row['icon'] . ')"></div>
             ';
            ?>

            <div class="">
              <img id="imageprop_image_<?php echo $row['id']; ?>"
                   src="<?php echo IMAGEPATH . '' . $row['icon']; ?>"
                   alt=""/>
              <div id="close-prop_image_<?php echo $row['id']; ?>">
                <button type="button">Reset</button>
              </div>
            </div>

            <input type="file" class="form-control"
                   id="prop_image_<?php echo $row['id']; ?>"
                   name="property[<?php echo $row['id']; ?>][image]"
            >
            <span class="help-block"> Max filesize is 400Kb</span>
            <input type="hidden"
                   name="property[<?php echo $row['id']; ?>][id]"
                   value="<?php echo $row['id']; ?>">

            <?php
            echo '<h4 class="property-item-title">
              <input type="text" class="full-textarea" name="property[' . $row['id'] . '][title]" value="' . $row['title'] . '">
              </h4>
              <p class="property-item-description">
              <textarea class="editor-area full-textarea" name="property[' . $row['id'] . '][description]">
              ' . $row['description'] . '
              </textarea></p>
              </div>';


          }
          echo '<a class="glyphicon glyphicon-plus add-new-prop add-new-prop-'.$row['id'].'">Add new item</a>';
          ?>

        </div>
      </div>
    </div>

    <?php
    echo '<div class="homepage-products-wrapper-edit">';
    ?>
    <div class="container homepage-products-bg-edit left-padding">
      <label for="gallery_bg_image">Gallery image:</label>
      <div class="smaller-image">
        <img id="imagegallery_bg"
             src="<?php echo IMAGEPATH . '' . $data['add']['gallery_bg']['path']; ?>"
             alt=""/>
        <div class="close-gallery_bg">
          <button type="button">Reset</button>
        </div>
      </div>

      <input type="file" class="form-control" id="gallery_bg_image"
             name="gallery_bg"
      >
      <span class="help-block"> Max filesize is 400Kb</span>
    </div>

    <div class="homepage-products-items-edit left-padding">
      <div class="homepage-products-edit container box-same-vpadding">
        <div class="homepage-products-row row">
          <?php
          $index = 1;

          foreach ($data['add']['gallery'] as $row) {
            echo '<div class="item-wrapper-edit ">';

            ?>

            <div class="">
              <img id="imagegallery_item_<?php echo $index; ?>"
                   src="<?php echo IMAGEPATH . '' . $row['path']; ?>"
                   alt=""/>
              <div id="close-gallery_item_<?php echo $index; ?>">
                <button type="button">Reset</button>
              </div>
            </div>

            <input type="file" class="form-control"
                   id="gallery_item_<?php echo $index; ?>"
                   name="gallery[item_<?php echo $index; ?>]">
            <span class="help-block"> Max filesize is 400Kb</span>
            <input type="hidden" name="gallery[item_<?php echo $index; ?>]">

            <?php
            echo '<div class="gallery-image-title">';
            echo '<label for="is-on-main-gallery-'
              . $index . '">Image title</label>';

             echo '<input type="text" id="is-on-main-gallery-'
              . $index . '" name="img-title-main-gallery[item_' . $index . ']">';
             echo '</div>';

             echo '<div class="is-on-main-item">';
            echo '<input type="checkbox" id="is-on-main-gallery-'
              . $index . '" name="is-on-main-gallery[item_' . $index . ']" ';
            if ($row['panel-displaying'] == '1') {
              echo ' checked ';
            }
            echo '>';
            echo '<label for="is-on-main-gallery-' . $index . '">Is main image</label>';
            echo '</div>';
            echo '</div>';

            $index = $index + 1;
          }
          ?>
        </div>
      </div>
    </div>
    </div>

    <div class="btn-wrapper container left-padding">
      <button class="btn" type="submit">SAVE</button>
    </div>
  </form>
</main>

<div id="imageNavMenu" class="modal fade image-nav-menu container"
     style="display: none;">
</div>
