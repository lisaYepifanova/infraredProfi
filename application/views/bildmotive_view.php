<main class="product">
  <?php
  $lang = getLanguage();

  if($lang == '2') {
    echo '<h1 class="page-header container text-capitalize left-padding left-padding">' . $data[0]['eng_title'] . '</h1>';
  } else {
    echo '<h1 class="page-header container text-capitalize left-padding left-padding">' . $data[0]['title'] . '</h1>';
  }
  ?>


  <?php
  $lang = getLanguage();

  if (isAuth()) {
    echo '<div class="container produkte-del box-small-margin "><a href="#delConfirm"
         data-toggle="modal" class="glyphicon glyphicon-trash"> Delete this category</a></div>';
    echo '<div class="container produkte-del box-small-margin "><a href="' . $_SERVER['REQUEST_URI'] . '/edit"
           class="glyphicon glyphicon-pencil"> Edit bildmotive category</a></div>';
  }
  ?>

  <div class="product-menu-wrapper col-sm-3 left-padding">
    <div class="product-menu floating">
      <ul>
        <?php

        $data;
        $debug = TRUE;
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $last = end($routes);

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
            } else {
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

    <div class='row box-mid-margin'>
      <?php
      if (!empty($data['images'])) {
        foreach ($data['images'] as $row) {
          echo '<div class="item-wrapper col-sm-4">';
          echo '<a href="#imageShow" class="imageNavMenuLink   item-' . $row['id'] . '" data-toggle="modal">';

          if($row['image'] == null) {
            echo '<div class="product-img"></div>';
          } else {
            echo '<div class="product-img" style="background-image:url(' . IMAGEPATH .  'products/bildmotive/' . $data[0]['name'] . '/' . $row['image'] . ')"></div>';
          }
           echo '<h4 class="product-name">' . $row['name'] . '</h4>';
          echo '</a></div>';
        }
      }
      else {
        echo 'No results';
      }


      ?>
    </div>

  </div>


</main>

<div id="imageShow" class="modal fade image-nav-menu "
     style="display: none;">
  <div class="modal-dialog aside-modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×
        </button>
        <div class="carousel-wrapper">
          <div id="bildGalleryCarousel"
               class="carousel slide product-carousel-top">
            <div class="carousel-inner">
              <?php

              if (!empty($data['images'])) {
                $activeIndex = TRUE;
                foreach ($data['images'] as $row) {
                  echo '<div class="item large-item item-' . $row['id'] . ' ';
                  if ($activeIndex) {
                    echo ' active ';
                    $activeIndex = FALSE;
                  }
                  echo '" >';
                  echo '<div class="item-container">';

                  if($row['image'] !== null) {
                    echo '<div class="item-image" style="background-image: url(' . IMAGEPATH .  'products/bildmotive/' . $data[0]['name'] . '/' . $row['image'] . ')"></div>';
                  } else {
                    echo '<div class="item-image"></div>';
                  }

                  echo '<div class="item-text" >' . $row['name'] . '</div>';

                  echo '</div>';
                  echo '</div>';
                }
              }
              ?>
            </div>
            <a class="left carousel-control" href="#bildGalleryCarousel"
               role="button" data-slide="prev">
                            <span
                                class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control"
               href="#bildGalleryCarousel"
               role="button" data-slide="next">
                            <span
                                class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php
  if(isAuth()) {
    ?>

    <div id="delConfirm" class="modal fade in"
         style="display: none;">
      <div class="modal-dialog aside-modal-dialog">
        <div class="modal-bg"></div>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">x
            </button>
            <h5 class="modal-title">
              Confirm the deletion
            </h5>

          </div>
          <div class="modal-body">
            Do you want to delete <?php echo strtoupper($pageTitle); ?> ?
          </div>
          <div class="modal-footer">
            <button type="button btn-danger"><a
                  href="<?php echo $_SERVER['REQUEST_URI']; ?>/delete">Delete </a>
            </button>
            <button type="button" data-dismiss="modal"
                    aria-hidden="true"> Cancel
            </button>
          </div>
        </div>
      </div>
    </div>

    <?php
  }