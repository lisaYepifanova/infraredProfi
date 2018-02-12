<main>

  <h1 class="page-header container text-capitalize left-padding">ADD RELATED PRODUCT</h1>
  <?php if ($pageTitle !== 'Produkte') { ?>
    <div class="product-menu-wrapper col-sm-3 left-padding">
      <div class="product-menu floating">
        <ul>
          <?php

          $data;
          $debug = TRUE;
          $routes = explode('/', $_SERVER['REQUEST_URI']);
          $last = end($routes);

          echo '<h4><a class="product-menu-item" href="/produkte">PRODUKTE</a></h4>';


          foreach ($data['menu']['root'] as $row) {
            echo '<li>';
            if ($routes[2] == $row['name']) {
              echo '<span class="glyphicon glyphicon-chevron-right"></span>';
            }

            echo '<a class="product-menu-item ';
            if ($routes[2] == $row['name']) {
              echo 'bold-item';
            }

            echo '" href="/produkte/' . $row['name'] . '">' . $row['title'] . '</a>';

            echo '</li>';
          }
          ?>

        </ul>
      </div>
    </div>
  <?php } ?>
  <div class="gallery-product-page container box-m-mg-top">
    <div class="add-new-product-links box-small-mb">
      <?php
      if (isAuth()) {
        echo '<div class="produkte-add-links box-small-mb"><a href="/produkte/add" class="glyphicon glyphicon-plus"> Add new category</a></div>';
        echo '<div class="produkte-add-links box-small-mb"><a href="/product/add" class="glyphicon glyphicon-plus"> Add new product</a></div>';
        echo '<div class="produkte-add-links box-small-mb"><a href="/thermostat/add" class="glyphicon glyphicon-plus"> Add new thermostat, etc.</a></div>';
      }
      ?>

    </div>
    <div class=''>
      <form enctype="multipart/form-data" role="form" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="409600000"/>
        <div class="box-mid-margin prod-name">
          <label for="name">Product name:</label>
          <input type="text" name="name" class="" id="name">
        </div>


        <!--item position-->
         <div class="row ">
          <div class="box-mid-margin col-sm-6">
            <label for="parent_id">Parent category:</label>
            <select class="form-control" id="parent_id" name="parent_id">
              <?php
              echo '<option value="0">No root</option>';
              foreach ($data['categories'] as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
              }
              ?>

            </select>
          </div>

          <div class="box-mid-margin col-sm-6 add-category-place">
            <label for="id">Place this product after:</label>


            <select class="form-control select-place-category category-0"
                    id="id-0" name="ord">
              <?php
              $first = 5;
              echo '<option value="' . $first . '">Place it first ' . $first . '</option>';
              foreach ($data['items'] as $row) {
                if ($row['parent_id'] == 0) {
                  $id = $row['ord'] + 1;
                  echo '<option value="' . $id . '">' . $row['ord'] . ' - ' . $row['title'] . '</option>';
                }
              }
              ?>

            </select>


            <?php foreach ($data['categories'] as $rr) { ?>
              <select
                  class="form-control select-place-category category-<?php echo $rr['id']; ?>"
                  id="id-<?php echo $rr['id']; ?>" name="id" disabled="disabled">
                <?php

                $first = 5;
                echo '<option value="' . $first . '">Place it first ' . $first . '</option>';

                foreach ($data['items'] as $row) {
                  if ($row['parent_id'] == $rr['id']) {
                    $id = $row['ord'] + 1;
                    echo '<option value="' . $id . '">' . $row['ord'] . ' - ' . $row['title'] . '</option>';
                  }
                }
                ?>

              </select>


            <?php } ?>
          </div>
        </div>

        <div class="box-mid-margin main-prod-image-prev">
          <label for="prod_main_image_item ">Main product image:</label>
          <div>
            <img id="prod_main_image"
                 src=""
                 alt=""/>
            <a href="#" class="close-prod_main_image">
              <button type="button">Reset</button>
            </a>
          </div>

          <input type="file" class="form-control" id="prod_main_image_field"
                 name="prod_main_image">
        </div>

        <!--carousel product images -->
        <div class="box-mid-margin prod-gallery-carousel-images">
          <label for="prod_image_item">Product images:</label>


            <div
                class="box-small-margin product-image-block prod-image-block-1">

              <div>
                <img id="prod_image-1"
                     src=""
                     alt=""/>
                <a class="close-prod_image-1">
                  <button type="button">Reset</button>
                </a>
              </div>
              <input type="file" class="form-control prod-img"
                     id="prod_image_field-1"
                     name="prod_image[1]">
              <input type="hidden"
                     name="prod_image[1][id]"
                     value="1">
            </div>


          <a class="glyphicon glyphicon-plus add-new-product-image-button">Add
            new image</a>
        </div>


        <!--description -->

        <div class="box-mid-margin">
          <label for="prod-description">Product description:</label>
          <textarea
              class="editor-area description-textarea "
              name="description-textarea" id="prod-description">

          </textarea>
        </div>

        <!--description -->



        <div class="box-mid-margin">
          <label for="short-prod-description">Short product description:</label>
          <textarea
              class="editor-area short-description-textarea "
              name="short-description-textarea" id="short-prod-description">

          </textarea>
        </div>


                        <!-- Principles -->
                <div class="box-mid-margin">
          <?php
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="has-prod-feature" value="1" id="has-prod-feature"';
          echo '><label for="has-prod-feature">Has features</label></div>';
          ?>
        </div>


        <!-- Features -->
        <div class="box-mid-margin edit-therm-features">
          <label for="prod_feature_item">Product features:</label>


              <div
                  class="row box-small-margin product-feature-block prod-feature-block-1"
                  id="prod-feature-block-1">
                <div class="col-sm-6">
                  <label
                      for="prod_feature_field[1][name]">Name:</label>
                  <input type="text" class="form-control prod-feature-name"
                         id="prod_feature_field[1][name]"
                         name="prod_feature[1][name]"
                  value="">
                </div>

                <div class="col-sm-6">
                  <label for="prod_feature_field[1][value]">Value:</label>
                  <input type="text" class="form-control prod-feature-value"
                         id="prod_feature_field[1][value]"
                         name="prod_feature[1][value]"
                  value="">
                </div>
              </div>


          <a class="glyphicon glyphicon-plus add-new-feature-button">Add
            new feature</a>

        </div>


                                <!-- Principles -->
        <div class="box-mid-margin">
          <?php
          echo '<div class="show-similar-option box-small-margin">
<input type="checkbox" name="show-similar" value="1" id="show-similar">
<label for="show-similar" class="show-similar-label">Show similar</label></div>';
          ?>
        </div>
        <div class="btn-wrapper container box-mid-margin left-padding">
          <button class="btn" type="submit">SAVE</button>
        </div>
      </form>
    </div>
  </div>

</main>
