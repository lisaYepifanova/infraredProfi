<main>

  <h1 class="page-header container text-capitalize left-padding">ADD
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
        <input type="hidden" name="MAX_FILE_SIZE" value="4096000"/>
        <div class="box-mid-margin ">
          <label for="name">Product name:</label>
          <input type="text" name="name" class="" id="name">
        </div>


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
          <label for="prod_main_image_item">Main product image:</label>
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
          <div class="box-small-margin product-image-block prod-image-block-1 ">

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
            <input type="hidden" name="prod_image[1][id]" value="1">
          </div>

          <a class="glyphicon glyphicon-plus add-new-product-image-button">Add
            new image</a>
        </div>


        <!--description -->

        <div class="box-mid-margin">
          <label for="prod-description">Product description:</label>
          <textarea
              class="editor-area description-textarea "
              name="description-textarea" id="prod-description"></textarea>
        </div>

        <!--farbvarianten -->
        <div class="box-mid-margin">
          <label for="prod-description">Farbvarianten:</label>

          <?php
          foreach ($data['colours'] as $row) {
            echo '<div class="prod-farb-option box-small-margin"><input type="checkbox" name="farb[]" value="' . $row['id'] . '" id="id-' . $row['id'] . '"><label for="id-' . $row['id'] . '"><img src="' . IMAGEPATH . $row['image'] . '" class="farb-img">' . $row['name'] . '</label></div>';
          }
          ?>

        </div>

        <!-- Sizes -->
        <div class="box-mid-margin ">
          <label for="prod_sizes_item">Product sizes:</label>

          <div  class="row box-small-margin product-sizes-block product-sizes-rect"
              id="prod-sizes-rect">
            <div class="rect-item rect-1">1</div>
          </div>

          <div
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

          </div>

          <a class="glyphicon glyphicon-plus add-new-model-button">Add
            new model</a>

        </div>


        <!-- Features -->
        <div class="box-mid-margin ">
          <label for="prod_feature_item">Product features:</label>
          <div
              class="row box-small-margin product-feature-block prod-feature-block-1"
              id="prod-feature-block-1">
            <div class="col-sm-6">
              <label for="prod_feature_field[1][name]">Name:</label>
              <input type="text" class="form-control prod-feature-name"
                     id="prod_feature_field[1][name]"
                     name="prod_feature[1][name]">
            </div>

            <div class="col-sm-6">
              <label for="prod_feature_field[1][value]">Value:</label>
              <input type="text" class="form-control prod-feature-value"
                     id="prod_feature_field[1][value]"
                     name="prod_feature[1][value]">
            </div>
          </div>

          <a class="glyphicon glyphicon-plus add-new-feature-button">Add
            new feature</a>

        </div>


        <!-- Principles -->
        <div class="box-mid-margin">
          <label for="prod-principles">Product principles:</label>
          <?php
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="zwei-principle" value="1" id="zwei-principle"><label for="zwei-principle">ZWEI RAUMHEIZPRINZIPIEN</label></div>';
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="drei-principle" value="1" id="drei-principle"><label for="drei-principle">DREI RAUMHEIZPRINZIPIEN</label></div>';
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="raum-principle" value="1" id="raum-principle"><label for="raum-principle">RAUMHEIZPRINZIPIEN</label></div>';
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="optional-thermostat" value="1" id="optional-thermostat"><label for="optional-thermostat">OPTIONAL: THERMOSTAT</label></div>';
          echo '<div class="prod-principles-option box-small-margin"><input type="checkbox" name="is-decken" value="1" id="is-decken"><label for="is-decken">DECKEN</label></div>';
          ?>
        </div>


        <div class="btn-wrapper container box-mid-margin left-padding">
          <button class="btn" type="submit">SAVE</button>
        </div>
      </form>
    </div>
  </div>

</main>
