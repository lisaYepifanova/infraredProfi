<main>

  <h1 class="page-header container text-capitalize left-padding">EDIT
    CATEGORY</h1>
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
    <div class='add-category-form-wrapper'>
      <form enctype="multipart/form-data" role="form" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="40960000"/>
        <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>"/>
        <div class="box-mid-margin">
          <label for="name">Category name:</label>
          <input type="text" name="name" class="" id="name"
                 value="<?php echo $data[0]['title']; ?>">
        </div>


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
                if ($row['parent_id'] == 0 && $row['title'] == $data[0]['title']) {
                  $prev = $placeid;
                  $placeid = $rowid;
                }
              }

              $placeid -= 1;

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

        <div class="box-mid-margin ">
          <label for="category_image_item">Category image:</label>
          <div>
            <img id="category_image"
                 src="<?php echo IMAGEPATH . $data[0]['image']; ?>"
                 alt=""/>
            <a class="close-category_image">
              <button type="button">Reset</button>
            </a>
          </div>

          <input type="file" class="form-control" id="category_image_field"
                 name="category_image">
        </div>
        <?php


        ?>
        <div class="btn-wrapper container box-mid-margin left-padding">
          <button class="btn" type="submit">SAVE</button>
        </div>
      </form>
    </div>
  </div>

</main>
