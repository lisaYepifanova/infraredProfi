<main class="product">

  <h1 class="page-header container text-capitalize left-padding left-padding">
    EDIT <?php echo $data['bildmotive_catalog'][0]['title']; ?></h1>


  <div class="product-menu-wrapper col-sm-3 left-padding">
    <div class="product-menu floating">
      <ul>
        <?php

        $data;
        $debug = TRUE;
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $last = end($routes);
        $lang = getLanguage();

        if ($lang == 2) {
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

          if ($lang == 2) {
            echo '" href="/products/' . $row['name'] . '">' . $row['title'] . '</a>';
          }
          else {
            echo '" href="/produkte/' . $row['name'] . '">' . $row['title'] . '</a>';
          }


          if ($routes[2] == $row['name'] and $routes[2] !== $data['bildmotive_catalog'][0]['name']) {
            $c = $data['menu']['category'];

            if ($lang == 2) {
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
      <input type="hidden" name="id" value="<?php echo $data['bildmotive_catalog'][0]['id']; ?>"/>
      <input type="hidden" name="old_name" value="<?php echo $data['bildmotive_catalog'][0]['title']; ?>"/>

      <!-- Name -->
      <div class="box-small-margin">
        <label for="name">Name:</label>
        <input type="text" name="name" class="" id="name"
               value="<?php echo $data['bildmotive_catalog'][0]['title']; ?>">
      </div>

      <!-- Position -->
      <!-- Parent -->
      <div class="box-small-margin col-sm-6">
        <label for="parent_id">Parent category:</label>
        <select class="form-control" id="parent_id" name="parent_id">
          <?php

          echo '<option ';
          if ($data['bildmotive_catalog'][0]['parent_id'] == "0") {
            echo ' selected ';
          }
          echo ' value="0">No root</option>';
          foreach ($data['categories'] as $row) {
            echo '<option value="' . $row['id'] . '"';
            if ($data['bildmotive_catalog'][0]['parent_id'] == $row['id']) {
              echo ' selected ';
            }
            echo '>' . $row['title'] . '</option>';
          }
          ?>

        </select>
      </div>

      <!-- Place after -->
      <div class="box-mid-margin col-sm-6 add-category-place">
        <label for="id">Place this product after:</label>


        <select
        <?php
        if ($data['bildmotive_catalog'][0]['parent_id'] !== "0") {
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
            if ($row['title'] == $data['bildmotive_catalog'][0]['title']) {
              $placeid = $rowid;
            }
          }


        }

        $t = array_search($placeid, $same_parent);
        if ($t !== 0) {
          $prev = $same_parent[$t - 1];
        }
        else {
          $prev = 0;
        }


        $first = 5;
        echo '<option ';

        if ($prev == '-1') {
          echo ' selected ';
        }

        echo ' value="' . $first . '">Place it first ' . $first . '</option>';


        foreach ($data['items'] as $rowid => $row) {
          if ($row['parent_id'] == 0 && $row['title'] !== $data['bildmotive_catalog'][0]['title']) {
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
          if ($data['bildmotive_catalog'][0]['parent_id'] !== $rr['id']) {
            echo ' disabled="disabled" style="display:none;"';
          }
          else {
            echo '  style="display:block;"';
          }

          echo '>';


          $placeid = -1;
          $prev = -1;

          foreach ($data['items'] as $rowid => $row) {
            if ($row['parent_id'] == $data['bildmotive_catalog'][0]['parent_id']) {
              $same_parent[] = $rowid;
              if ($row['title'] == $data['bildmotive_catalog'][0]['title']) {
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
            if ($row['parent_id'] == $rr['id'] && $row['title'] !== $data['bildmotive_catalog'][0]['title']) {
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

      <!-- Image -->
      <div class="box-mid-margin ">
        <label for="category_image_item">Category image:</label>
        <div>
          <img id="category_image"
               src="<?php echo IMAGEPATH . $data['bildmotive_catalog'][0]['image']; ?>"
               alt=""/>
          <a class="close-category_image">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="category_image_field"
               name="category_image">
      </div>


      <!--description -->

      <div class="box-mid-margin">
        <label for="prod-description">Product description:</label>
        <textarea
            class="editor-area description-textarea "
            name="description-textarea"
            id="prod-description"><?php echo $data['bildmotive_catalog'][0]['description']; ?></textarea>
      </div>

      <div class="btn-wrapper container box-mid-margin left-padding">
        <button class="btn" type="submit">SAVE</button>
      </div>
    </form>
  </div>


</main>

