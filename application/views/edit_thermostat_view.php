<main>

  <h1 class="page-header container text-capitalize left-padding">EDIT RELATED
    PRODUCT</h1>
  <?php
  $lang = getLanguage();
  if ($pageTitle !== 'Produkte' && $pageTitle !== 'Products') { ?>
    <div class="product-menu-wrapper col-sm-3 left-padding">
      <div class="product-menu floating">
        <ul>
          <?php

          $data;
          $debug = TRUE;
          $routes = explode('/', $_SERVER['REQUEST_URI']);
          $last = end($routes);
          $routes_count = count($routes);

          if ($last == 'edit') {
            $curr = $routes[$routes_count - 2];
          }
          else {
            $curr = $last;
          }
          $res = [];

          $last = $curr;

          if ($lang == '2') {
            echo '<h4><a class="product-menu-item" href="/products">PRODUCTS</a></h4>';
          }
          else {
            echo '<h4><a class="product-menu-item" href="/produkte">PRODUKTE</a></h4>';
          }

          foreach ($data['menu']['root'] as $row) {
            echo '<li>';
            if ($routes[2] == $row['name']) {
              echo '<span class="glyphicon glyphicon-chevron-right"></span>';
            }

            echo '<a class="product-menu-item ';
            if ($routes[2] == $row['name']) {
              echo 'bold-item';
            }

            if ($lang == '2') {
              echo '" href="/products/' . $row['name'] . '">' . $row['title'] . '</a>';
            }
            else {
              echo '" href="/produkte/' . $row['name'] . '">' . $row['title'] . '</a>';
            }


            if ($routes[2] == $row['name'] and $routes[2] !== $data[0]['name']) {
              $c = $data['menu']['category'];
              if ($lang == '2') {
                $link = "/products/" . $row['name'];
              }
              else {
                $link = "/produkte/" . $row['name'];
              }

              if ($c !== "") {
                while ($c['next'] !== "") {
                  echo '<ul>';
                  echo '<li><a href="' . $link . '/' . $c['next']['name'] . '">' . $c['next']['title'] . '</a>';
                  $link = $link . '/' . $c['next']['name'];
                  $c = $c['next'];
                }
              }

              echo '<ul>';
              $n = $data['menu']['neighbours'];
              foreach ($n as $row) {
                echo '<li>';

                if ($last == $row['name']) {
                  echo '<span class="glyphicon glyphicon-chevron-right"></span>';
                }

                echo '<a href="' . $link . '/' . $row['name'] . '">' . $row['title'] . '</a></li>';
              }
              echo '</ul>';

              $c = $data['menu']['category'];
              if ($c !== '') {
                while ($c['next'] !== "") {
                  echo '</ul>';
                  $c = $c['next'];
                }
              }
            }
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
        if ($lang == '2') {
          echo '<div class="produkte-add-links box-small-mb"><a href="/products/add" class="glyphicon glyphicon-plus"> Add new category</a></div>';
        }
        else {
          echo '<div class="produkte-add-links box-small-mb"><a href="/produkte/add" class="glyphicon glyphicon-plus"> Add new category</a></div>';
        }

        echo '<div class="produkte-add-links box-small-mb"><a href="/product/add" class="glyphicon glyphicon-plus"> Add new product</a></div>';
        echo '<div class="produkte-add-links box-small-mb"><a href="/thermostat/add" class="glyphicon glyphicon-plus"> Add new thermostat, etc.</a></div>';
      }
      ?>

    </div>
    <div class='edit-product'>
      <form enctype="multipart/form-data" role="form" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="409600000"/>
        <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>"/>
        <div class="box-mid-margin prod-name">
          <label for="name">Product name:</label>
          <input type="text" name="name" class="" id="name"
                 value="<?php echo $data[0]['title']; ?>">
        </div>

        <!--item position-->
        <div class="row ">
          <div class="box-mid-margin col-sm-6">
            <label for="parent_id">Parent category:</label>
            <select class="form-control" id="parent_id" name="parent_id">
              <?php

              echo '<option ';
              if ($data[0]['parent_id'] == "0") {
                echo ' selected ';
              }
              echo ' value="0">No root</option>';
              foreach ($data['categories'] as $row) {
                echo '<option value="' . $row['id'] . '"';
                if ($data[0]['parent_id'] == $row['id']) {
                  echo ' selected ';
                }
                echo '>' . $row['title'] . '</option>';
              }
              ?>

            </select>
          </div>

          <div class="box-mid-margin col-sm-6 add-category-place">
            <label for="id">Place this product after:</label>

            <select
            <?php
            if ($data[0]['parent_id'] !== "0") {
              echo ' disabled="disabled" style="display:none;"';
            }
            else {
              echo '  style="display:block;"';
            }

            echo ' class="form-control select-place-category category-0"
                id="id-0" name="ord">';

            $placeid = 0;

            $prev = -1;
            foreach ($data['items'] as $rowid => $row) {
              if ($row['parent_id'] == 0) {
                $same_parent[] = $rowid;
                if ($row['title'] == $data[0]['title']) {
                  $placeid = $rowid;
                }
              }
            }

            $t = array_search($placeid, $same_parent);
            $prev = $same_parent[$t - 1];

            $first = 5;
            echo '<option ';

            if ($prev == '-1') {
              echo ' selected ';
            }

            echo ' value="' . $first . '">Place it first ' . $first . '</option>';

            foreach ($data['items'] as $rowid => $row) {
              if ($row['parent_id'] == 0 && $row['title'] !== $data[0]['title']) {
                $id = $row['ord'] + 1;
                echo '<option ';
                if ($prev == $rowid) {
                  echo ' selected ';
                }
                echo ' value="' . $id . '">' . $row['ord'] . ' - ' . $row['title'] . '</option>';
              }
            }
            ?>
            </select>

            <?php foreach ($data['categories'] as $rr) { ?>
              <select
                  class="form-control select-place-category category-<?php echo $rr['id']; ?>"
                  id="id-<?php echo $rr['id']; ?>" name="ord"
              <?php
              if ($data[0]['parent_id'] !== $rr['id']) {
                echo ' disabled="disabled" style="display:none;"';
              }
              else {
                echo '  style="display:block;"';
              }
              echo '>';

              $placeid = -1;
              $prev = -1;

              foreach ($data['items'] as $rowid => $row) {
                if ($row['parent_id'] == $data[0]['parent_id']) {
                  $same_parent[] = $rowid;
                  if ($row['title'] == $data[0]['title']) {
                    $placeid = $rowid;
                  }
                }
              }

              $t = array_search($placeid, $same_parent);
              $prev = $same_parent[$t - 1];
              $first = 5;
              echo '<option ';

              if ($prev == '-1') {
                echo ' selected ';
              }

              echo 'value="' . $first . '">Place it first ' . $first . '</option>';

              foreach ($data['items'] as $rowid => $row) {
                if ($row['parent_id'] == $rr['id'] && $row['title'] !== $data[0]['title']) {
                  $id = $row['ord'] + 1;
                  echo '<option ';
                  if ($prev == $rowid) {
                    echo ' selected ';
                  }
                  echo ' value="' . $id . '">' . $row['ord'] . ' - ' . $row['title'] . '</option>';
                }
              }
              ?>
              </select>

            <?php } ?>
          </div>
        </div>

        <!-- main product image -->
        <div class="box-mid-margin main-prod-image-prev">
          <label for="prod_main_image_item ">Main product image:</label>
          <div>

            <img id="prod_main_image"
                 src="<?php

                 $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $data[0]['image'];
                 if (is_file($row_path)) {
                   echo IMAGEPATH . $data[0]['image'];
                 }
                 ?>" alt=""/>
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

          <?php
          if (isset($data['gallery'])) {
            foreach ($data['gallery'] as $rowid => $row) {
              ?>
              <div
                  class="box-small-margin product-image-block prod-image-block-<?php echo $rowid + 1; ?> image-item-<?php echo $row['id']; ?>">

                <div>

                  <input type="hidden"
                         name="prod_gallery_id-<?php echo $rowid + 1; ?> value="<?php echo $row['id']; ?>
                  ">
                  <img id="prod_image-<?php echo $rowid + 1; ?>"
                       src="<?php

                       $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $row['path'];
                       if (is_file($row_path)) {
                         echo IMAGEPATH . $row['path'];
                       }

                       ?>"
                       alt=""/>
                  <a class="close-prod_image-<?php echo $rowid + 1; ?>">
                    <button type="button">Reset</button>
                  </a>
                  <a class="delete-prod-image prod-<?php echo $row['id']; ?>">
                    <button type="button">Delete</button>
                  </a>
                </div>
                <input type="file" class="form-control prod-img"
                       id="prod_image_field-<?php echo $rowid + 1; ?>"
                       name="prod_image[<?php echo $rowid + 1; ?>]">
                <input type="hidden"
                       name="prod_image[<?php echo $rowid + 1; ?>][id]"
                       value="<?php echo $rowid + 1; ?>">
              </div>

              <?php
            }
          }
          else {
            ?>
            <div
                class="box-small-margin product-image-block prod-image-block-1 image-item-1">

              <div>

                <input type="hidden"
                       name="prod_gallery_id-1 value="">
                <img id="prod_image-1"
                     src=""
                     alt=""/>
                <a class="close-prod_image-1">
                  <button type="button">Reset</button>
                </a>
                <a class="delete-prod-image prod-1">
                  <button type="button">Delete</button>
                </a>
              </div>
              <input type="file" class="form-control prod-img"
                     id="prod_image_field-1"
                     name="prod_image[1]">
              <input type="hidden"
                     name="prod_image[1][id]"
                     value="">
            </div>

            <?php
          }
          ?>
          <a class="glyphicon glyphicon-plus add-new-product-image-button">Add
            new image</a>
        </div>

        <!--description -->
        <div class="box-mid-margin">
          <label for="prod-description">Product description:</label>
          <textarea
              class="editor-area description-textarea "
              name="description-textarea"
              id="prod-description"><?php echo $data[0]['description']; ?></textarea>
        </div>

        <!--description -->
        <div class="box-mid-margin">
          <label for="short-prod-description">Short product description:</label>
          <textarea
              class="editor-area short-description-textarea "
              name="short-description-textarea"
              id="short-prod-description"><?php echo $data[0]['short_description']; ?></textarea>
        </div>

        <!-- Principles -->
        <div class="box-mid-margin">
          <?php
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="has-prod-feature" value="1" id="has-prod-feature"';
          if (isset($data['features'])) {
            echo ' checked ';
          }
          echo '><label for="has-prod-feature">Has features</label></div>';
          ?>
        </div>

        <!-- Features -->
        <div class="box-mid-margin edit-therm-features">
          <label for="prod_feature_item">Product features:</label>

          <?php
          if (isset($data['features'])) {
            foreach ($data['features'] as $rowid => $row) {
              $r = $rowid + 1;
              ?>
              <div
                  class="row box-small-margin product-feature-block prod-feature-block-<?php echo $r; ?>"
                  id="prod-feature-block-<?php echo $r; ?>">
                <div class="col-sm-6">
                  <label
                      for="prod_feature_field[<?php echo $r; ?>][name]">Name:</label>
                  <input type="text" class="form-control prod-feature-name"
                         id="prod_feature_field[<?php echo $r; ?>][name]"
                         name="prod_feature[<?php echo $r; ?>][name]"
                         value="<?php echo $row['feature']; ?>">
                </div>

                <div class="col-sm-6">
                  <label
                      for="prod_feature_field[<?php echo $r; ?>][value]">Value:</label>
                  <input type="text" class="form-control prod-feature-value"
                         id="prod_feature_field[<?php echo $r; ?>][value]"
                         name="prod_feature[<?php echo $r; ?>][value]"
                         value="<?php echo $row['value']; ?>">
                </div>
              </div>

              <?php
            }
          }
          else {
            ?>
            <div
                class="row box-small-margin product-feature-block prod-feature-block-1"
                id="prod-feature-block-1">
              <div class="col-sm-6">
                <label
                    for="prod_feature_field[1][name]">Name:</label>
                <input type="text" class="form-control prod-feature-name"
                       id="prod_feature_field[1][name]"
                       name="prod_feature[1][name]"">
              </div>

              <div class="col-sm-6">
                <label
                    for="prod_feature_field[1][value]">Value:</label>
                <input type="text" class="form-control prod-feature-value"
                       id="prod_feature_field[1][value]"
                       name="prod_feature[1][value]">
              </div>
            </div>

            <?php

          }
          ?>

          <a class="glyphicon glyphicon-plus add-new-feature-button">Add
            new feature</a>

        </div>

        <!-- Principles -->
        <div class="box-mid-margin">
          <?php
          echo '<div class="show-similar-option box-small-margin">
            <input type="checkbox" name="show-similar" value="1" id="show-similar"';
          if ($data[0]['has_similar_products'] == '1') {
            echo ' checked ';
          }
          echo '><label for="show-similar" class="show-similar-label">Show similar</label></div>';
          ?>
        </div>
        <div class="btn-wrapper container box-mid-margin left-padding">
          <button class="btn" type="submit">SAVE</button>
        </div>
      </form>
    </div>
  </div>
</main>
