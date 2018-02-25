<main>

  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT MAIN PAGE</h1>
  <form enctype="multipart/form-data" method="post">
    <?php echo '<input type="hidden" name="max_prop_id" id="max_prop_id" value="'.$data['add']['max_prop_id'].'">'; ?>
    <?php echo '<input type="hidden" name="max_carousel_id" id="max_carousel_id" value="'.$data['add']['max_carousel_id'].'">'; ?>
    <?php echo '<input type="hidden" name="max_gallery_id" id="max_gallery_id" value="'.$data['add']['max_gallery_id'].'">'; ?>
<input type="hidden" name="MAX_FILE_SIZE" value="2096000"/>
    <div class="homepage-header container left-padding">
      <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="<?php echo IMAGEPATH; ?>user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
      <div class="homepage-carousel ">
        <h4 class="box-mid-margin">Carousel images</h4>
        <?php

        foreach ($data['add']['header_slider'] as $id=>$row) {
          echo '<div class="item-edit">
        <div class="carousel-img-ed carousel-image-edit' . $row['id']. '">';
          ?>

          <div class="prev-image">
            <img id="imagecarousel_image_<?php echo $row['id']; ?>"
                 src="<?php echo IMAGEPATH . '' . $row['img']; ?>"
                 alt=""/>
            <div id="close-carousel_image_<?php echo $row['id']; ?>">
              <button type="button">Reset</button>
            </div>
          </div>

          <input type="file" class="form-control"
                 id="carousel_image_<?php echo $row['id']; ?>"
                 name="carousel_image[carousel_image_<?php echo $row['id']; ?>]"
          >
          <span class="help-block"> Max filesize is 2mb</span>
          <input type="hidden"
                 name="carousel_image[carousel_image_<?php echo $row['id']; ?>]"
                 value="<?php echo $row['id']; ?>">

          <?php

            echo '<a class="glyphicon glyphicon-trash delete-carousel-item"
                data-toggle="modal"
                data-target="#delCarouselItem-' . $row['id'] . '">Delete</a>';
              modalSliderWin($row['id']);

          echo '</div> </div>';
        }
        echo '<a class="glyphicon glyphicon-plus add-new-carousel-item ">Add new carousel image</a>';
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
  <label for="philosophy_text">Description:</label>

  <?php
  include 'application/connection.php';

  $q = "SELECT * FROM philosophy WHERE lid=".$lang;
  $query = $mysqli->query($q);

  if ($query) {
    while ($r = mysqli_fetch_assoc($query)) {
      echo '<textarea name="philosophy_text" id="philosophy_text" class="full-textarea editor-area">' . $r['text'] . '</textarea>';
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
          <span class="help-block"> Max filesize is 2mb</span>
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
            <span class="help-block"> Max filesize is 2mb</span>
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
    echo '<label for="gallery_name">Gallery name</label>';
    echo '<input id="gallery_name" type="text" name="gallery_name" value="'.$data['add']['gallery_name'].'">';
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
      <span class="help-block"> Max filesize is 2mb</span>
    </div>

    <div class="homepage-products-items-edit left-padding">
      <div class="homepage-products-edit container box-same-vpadding">
        <div class="homepage-products-row row">
          <?php

          foreach ($data['add']['gallery'] as $row) {
            echo '<div class="item-wrapper-edit ">';

            ?>

            <div class="">
              <img id="imagegallery_item_<?php echo $row['id']; ?>"
                   src="<?php echo IMAGEPATH . '' . $row['path']; ?>"
                   alt=""/>
              <div id="close-gallery_item_<?php echo $row['id']; ?>">
                <button type="button">Reset</button>
              </div>
            </div>

            <input type="file" class="form-control"
                   id="gallery_item_<?php echo $row['id']; ?>"
                   name="gallery[item_<?php echo $row['id']; ?>]">
            <span class="help-block"> Max filesize is 2mb</span>
            <input type="hidden" name="gallery[item_<?php echo $row['id']; ?>]" value="<?php echo $row['id']; ?>">

            <?php
            echo '<div class="gallery-image-title">';
            echo '<label for="image-title-'
              . $row['id'] . '">Image title  </label>';

             echo '<input type="text" class="box-lr-1m" id="image-title-'
              . $row['id'] . '" value="' . $row['alt'] . '" name="img-title-main-gallery[item_' . $row['id'] . ']">';
             echo '</div>';

             echo '<div class="is-on-main-item">';
            echo '<input type="checkbox" id="is-on-main-gallery-'
              . $row['id'] . '" name="is-on-main-gallery[item_' . $row['id'] . ']" ';
            if ($row['panel_displaying'] == '1') {
              echo ' checked ';
            }
            echo '>';
            echo '<label for="is-on-main-gallery-' . $row['id'] . '">Is main image</label>';

            echo '<br><a class="glyphicon glyphicon-trash delete-homepage-gallery-item"
                data-toggle="modal"
                data-target="#delGalleryItem-' . $row['id'] . '">Delete</a>';
              modalGalleryWin($row['id']);

            echo '</div>';
            echo '</div>';

          }
          echo '<a class="glyphicon glyphicon-plus add-new-gallery-item ">Add new gallery image</a>';
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

 <?php
        function modalSliderWin($j) {
          echo '<div class="modal fade" id="delCarouselItem-' . $j . '" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deleting image</h4>
        </div>
        <div class="modal-body">
          <p>Do you want to delete image?</p>
        </div>
        <div class="modal-footer">
          <a href="/main/delete-slider-img/' . $j . '" class="btn btn-default">Delete</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cansel</button>
          
        </div>
      </div>

    </div>
  </div>';
        }
        ?>

 <?php
        function modalGalleryWin($j) {
          echo '<div class="modal fade" id="delGalleryItem-' . $j . '" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deleting image</h4>
        </div>
        <div class="modal-body">
          <p>Do you want to delete image?</p>
        </div>
        <div class="modal-footer">
          <a href="/main/delete-gallery-img/' . $j . '" class="btn btn-default">Delete</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cansel</button>
          
        </div>
      </div>

    </div>
  </div>';
        }

        ?>
