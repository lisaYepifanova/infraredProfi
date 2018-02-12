<main>

  <h1 class="page-header container text-capitalize left-padding">EDIT
    PRODUCT</h1>
  <?php if ($pageTitle !== 'Produkte') { ?>
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
    <div class='edit-product'>
      <form enctype="multipart/form-data" role="form" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="4096000"/>
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


        <div class="box-mid-margin main-prod-image-prev">
          <label for="prod_main_image_item ">Main product image:</label>
          <div>
            <img id="prod_main_image"
                 src="<?php echo IMAGEPATH . $data[0]['image']; ?>"
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

          <?php
          if(isset($data['gallery'])) {
            foreach ($data['gallery'] as $rowid => $row) {
            ?>
            <div
                class="box-small-margin product-image-block prod-image-block-<?php echo $rowid + 1; ?>  image-item-<?php echo $row['id']; ?>" >

              <div>
                <img id="prod_image-<?php echo $rowid + 1; ?>"
                     src="<?php echo IMAGEPATH . $row['path']; ?>"
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
          } else {
            echo '
             <div
                class="box-small-margin product-image-block prod-image-block-1  image-item-1" >

              <div>
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
                     value="1">
            </div>';
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

        <!--farbvarianten -->
        <div class="box-mid-margin">
          <label for="prod-description">Farbvarianten:</label>

          <?php
          foreach ($data['all_colours'] as $row) {
            echo '<div class="prod-farb-option box-small-margin"><input type="checkbox" ';
            if ($row['checked']) {
              echo ' checked ';
            }
            echo ' name="farb[]" value="' . $row['id'] . '" id="id-' . $row['id'] . '"><label for="id-' . $row['id'] . '"><img src="' . IMAGEPATH . $row['image'] . '" class="farb-img">' . $row['name'] . '</label></div>';
          }
          ?>

        </div>

        <!-- Sizes -->
        <div class="box-mid-margin ">
          <label for="prod_sizes_item">Product sizes:</label>

          <div
              class="row box-small-margin product-sizes-block product-sizes-rect"
              id="prod-sizes-rect">
            <?php
            if(count($data['sizes']) !== 0) {
              foreach ($data['sizes'] as $rowid => $row) {
                $r = $rowid + 1;
                echo '<div class="rect-item rect-' . $r . '" style="width:' . $row['sizex'] / 5 . 'px;height:' . $row['sizey'] / 5 . 'px;left:' . $row['left'] / 5 . 'px;bottom:' . $row['bottom'] / 5 . 'px;">' . $r . '</div>';
              }
            } else {
              echo '<div class="rect-item rect-1">1</div>';
            }
            ?>

          </div>

          <?php
          if(count($data['sizes']) !== 0 ) {
          foreach ($data['sizes'] as $rowid => $row) {
            $r = $rowid + 1;
            ?>
            <div
                class="row box-small-margin product-sizes-block prod-sizes-block-<?php echo $r; ?>"
                id="prod-sizes-block-<?php echo $r; ?>">
              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][model]">Model
                  name:</label>
                <input type="text" class="form-control prod-size-model"
                       id="prod_sizes_field[<?php echo $r; ?>][model]"
                       name="prod_sizes_field[<?php echo $r; ?>][model]"
                       value="<?php echo $row['modell']; ?>">
              </div>

              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][w]">Width
                  (mm):</label>
                <input type="text" class="form-control prod-size-w"
                       id="prod_sizes_field[<?php echo $r; ?>][w]"
                       name="prod_sizes_field[<?php echo $r; ?>][w]"
                       value="<?php echo $row['sizex']; ?>">
              </div>

              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][h]">Height
                  (mm):</label>
                <input type="text" class="form-control prod-size-h"
                       id="prod_sizes_field[<?php echo $r; ?>][h]"
                       name="prod_sizes_field[<?php echo $r; ?>][h]"
                       value="<?php echo $row['sizey']; ?>">
              </div>

              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][l]">Thickness
                  (mm):</label>
                <input type="text" class="form-control prod-size-l"
                       id="prod_sizes_field[<?php echo $r; ?>][l]"
                       name="prod_sizes_field[<?php echo $r; ?>][l]"
                       value="<?php echo $row['sizez']; ?>">
              </div>

              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label
                    for="prod_sizes_field[<?php echo $r; ?>][left]">Left:</label>
                <input type="number" class="form-control prod-size-left"
                       id="prod_sizes_field[<?php echo $r; ?>][left]"
                       name="prod_sizes_field[<?php echo $r; ?>][left]"

                       value="<?php echo $row['left']; ?>">
              </div>

              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label
                    for="prod_sizes_field[<?php echo $r; ?>][bottom]">Bottom:</label>
                <input type="number" class="form-control prod-size-bottom"
                       id="prod_sizes_field[<?php echo $r; ?>][bottom]"
                       name="prod_sizes_field[<?php echo $r; ?>][bottom]"

                       value="<?php echo $row['bottom']; ?>">
              </div>


              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][raumgrosse]">Raumgrosse:</label>
                <input type="text" class="form-control prod-size-raumgrosse"
                       id="prod_sizes_field[<?php echo $r; ?>][raumgrosse]"
                       name="prod_sizes_field[<?php echo $r; ?>][raumgrosse]"
                       value="<?php echo $row['raumgrose']; ?>">
              </div>

              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][leistung]">Leistung:</label>
                <input type="text" class="form-control prod-size-leistung"
                       id="prod_sizes_field[<?php echo $r; ?>][leistung]"
                       name="prod_sizes_field[<?php echo $r; ?>][leistung]"
                       value="<?php echo $row['leistung']; ?>">
              </div>

              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][gewicht]">Gewicht:</label>
                <input type="text" class="form-control prod-size-gewicht"
                       id="prod_sizes_field[<?php echo $r; ?>][gewicht]"
                       name="prod_sizes_field[<?php echo $r; ?>][gewicht]"
                       value="<?php echo $row['gewicht']; ?>">
              </div>


              <div class="col-xs-6 col-sm-3 box-small-margin">
                <label for="prod_sizes_field[<?php echo $r; ?>][einbauhohe]">Einbauhohe:</label>
                <input type="text" class="form-control prod-size-einbauhohe"
                       id="prod_sizes_field[<?php echo $r; ?>][einbauhohe]"
                       name="prod_sizes_field[<?php echo $r; ?>][einbauhohe]"
                       value="<?php echo $row['einbauhohe']; ?>">
              </div>

            </div>
            <?php
          }
          } else {
              echo '<div
              class="row box-small-margin product-sizes-block prod-sizes-block-1"
              id="prod-sizes-block-1">
            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][model]">Model name:</label>
              <input type="text" class="form-control prod-size-model"
                     id="prod_sizes_field[1][model]"
                     name="prod_sizes_field[1][model]">
            </div>

            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][w]">Width (mm):</label>
              <input type="text" class="form-control prod-size-w"
                     id="prod_sizes_field[1][w]"
                     name="prod_sizes_field[1][w]">
            </div>

            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][h]">Height (mm):</label>
              <input type="text" class="form-control prod-size-h"
                     id="prod_sizes_field[1][h]"
                     name="prod_sizes_field[1][h]">
            </div>

            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][l]">Thickness (mm):</label>
              <input type="text" class="form-control prod-size-l"
                     id="prod_sizes_field[1][l]"
                     name="prod_sizes_field[1][l]">
            </div>

            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][left]">Left:</label>
              <input type="number" class="form-control prod-size-left"
                     id="prod_sizes_field[1][left]"
                     name="prod_sizes_field[1][left]"
                      value="0">
            </div>

            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][bottom]">Bottom:</label>
              <input type="number" class="form-control prod-size-bottom"
                     id="prod_sizes_field[1][bottom]"
                     name="prod_sizes_field[1][bottom]"
                      value="0">
            </div>


            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][raumgrosse]">Raumgrosse:</label>
              <input type="text" class="form-control prod-size-raumgrosse"
                     id="prod_sizes_field[1][raumgrosse]"
                     name="prod_sizes_field[1][raumgrosse]">
            </div>

            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][leistung]">Leistung:</label>
              <input type="text" class="form-control prod-size-leistung"
                     id="prod_sizes_field[1][leistung]"
                     name="prod_sizes_field[1][leistung]">
            </div>

            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][gewicht]">Gewicht:</label>
              <input type="text" class="form-control prod-size-gewicht"
                     id="prod_sizes_field[1][gewicht]"
                     name="prod_sizes_field[1][gewicht]">
            </div>


            <div class="col-xs-6 col-sm-3 box-small-margin">
              <label for="prod_sizes_field[1][einbauhohe]">Einbauhohe:</label>
              <input type="text" class="form-control prod-size-einbauhohe"
                     id="prod_sizes_field[1][einbauhohe]"
                     name="prod_sizes_field[1][einbauhohe]">
            </div>

          </div>';
            }
          ?>
          <a class="glyphicon glyphicon-plus add-new-model-button">Add
            new model</a>

        </div>


        <!-- Features -->
        <div class="box-mid-margin ">
          <label for="prod_feature_item">Product features:</label>

          <?php
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
          ?>

          <a class="glyphicon glyphicon-plus add-new-feature-button">Add
            new feature</a>

        </div>


        <!-- Principles -->
        <div class="box-mid-margin">
          <label for="prod-principles">Product principles:</label>
          <?php
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="zwei-principle" value="1" id="zwei-principle"';

          if (isset($data['principles'][0]['title'])) {
            if ($data['principles'][0]['title'] == "ZWEI RAUMHEIZPRINZIPIEN:") {
              echo ' checked ';
            }
          }

          echo '><label for="zwei-principle">ZWEI RAUMHEIZPRINZIPIEN</label></div>';
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="drei-principle" value="1" id="drei-principle" ';

          if (isset($data['principles'][0]['title'])) {
            if ($data['principles'][0]['title'] == "DREI RAUMHEIZPRINZIPIEN:") {
              echo ' checked ';
            }
          }
          echo ' ><label for="drei-principle">DREI RAUMHEIZPRINZIPIEN</label></div>';
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="raum-principle" value="1" id="raum-principle"';

          if (isset($data['principles'][0]['title'])) {
            if ($data['principles'][0]['title'] == "RAUMHEIZPRINZIPIEN:") {
              echo ' checked ';
            }
          }
          echo '><label for="raum-principle">RAUMHEIZPRINZIPIEN</label></div>';


          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="optional-thermostat" value="1" id="optional-thermostat"';
          if (isset($data[0]['has_thermostat'])) {
            if ($data[0]['has_thermostat'] == "1") {
              echo ' checked ';
            }
          }
          echo '><label for="optional-thermostat">OPTIONAL: THERMOSTAT</label></div>';


          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="is-decken" value="1" id="is-decken"';
          if ($data[0]['has_height'] == "1") {
            echo ' checked ';
          }
          echo '><label for="is-decken">DECKEN</label></div>';
          ?>
        </div>


        <div class="btn-wrapper container box-mid-margin left-padding">
          <button class="btn" type="submit">SAVE</button>
        </div>
      </form>
    </div>
  </div>

</main>
