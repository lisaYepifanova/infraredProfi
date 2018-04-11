<main class="product">

  <h1 class="page-header container text-capitalize left-padding left-padding">
    ADD BILDMOTIVE CATEGORY</h1>


  <div class="product-menu-wrapper col-sm-3 left-padding">
    <div class="product-menu floating">
      <ul>
        <?php

        $data;
        $debug = TRUE;
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $last = end($routes);
        $lang = getLanguage();

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

          if ($routes[2] == $row['name'] and $routes[2] !== $data['bildmotive_catalog'][0]['name']) {
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

  <div class=" container left-padding">
    <form enctype="multipart/form-data" role="form" action="" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value="40960000"/>
      <input type="hidden" id="max_gallery_id" name="max_gallery_id"
             value="<?php echo $data['max_id_gallery'] + 1; ?>"/>

      <?php
      echo '<div class="box-small-margin "><label class="bildmotive-edit-title " for="category_name">Category title</label>';
      echo '<input type="text" id="category_name" name="category_name" value=""></div>';
      ?>

      <!-- Place after -->
      <div class="box-mid-margin add-category-place">
        <label for="id">Place this product after:</label>
        <select class="form-control" name="ord">
          <?php


          echo '<option selected value="5">Place first</option>';
          foreach ($data['bildmotive_items'] as $row) {
            $ord = $row['ord'] + 1;
            echo '<option value="' . $ord . '">' . $row['title'] . '</option>';
          }
          ?>
        </select>

      </div>

      <!-- Image -->
      <div class="box-mid-margin ">
        <label for="category_image_item">Category image:</label>
        <div>
          <img id="category_image"
               class="edit-bildmotive-main-image"
               src=""
               alt=""/>
          <a class="close-category_image">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="category_image_field"
               name="category_image">
      </div>


      <hr>

      <!--carousel product images -->
      <div class="box-mid-margin prod-gallery-carousel-images ">
        <label>Product images:</label>

        <?php
        $currid = $data['max_id_gallery'] + 1;

        echo '
<div class="row edit-gallery-image-item  edit-gallery-image-item-' . $currid . ' box-mid-margin">
             <div
                class="  col-sm-6 product-image-block prod-image-block-' . $currid . '  image-item-' . $currid . '" >

              <div>
                <img id="prod_image-' . $currid . '"
                     src=""
                     alt=""/>
                <a class="close-prod close-bild_image-' . $currid . '">
                  <button type="button">Reset</button>
                </a>
                 <a class="delete-prod-image del-bild-' . $currid . '">
                  <button type="button">Delete</button>
                </a>
              </div>
              <input type="file" class="form-control prod-img"
                     id="prod_image_field-' . $currid . '"
                     name="prod_image[' . $currid . '][image]">
              <input type="hidden"
                     name="prod_image[' . $currid . '][id]"
                     value="' . $currid . '">
            </div>
             <div class="product-image-block  col-sm-6">
                <label for="prod_image[' . $currid . '][name]"> Name </label>
                <input type="text" id="prod_image[' . $currid . '][name]" name="prod_image[' . $currid . '][name]">
              </div>
              </div>
            ';

        ?>
        <a class="glyphicon glyphicon-plus add-new-bildmotive-image-button">Add
          new image</a>
      </div>


      <div class="btn-wrapper container box-mid-margin left-padding">
        <button class="btn" type="submit">SAVE</button>
      </div>
    </form>
  </div>


</main>

