<main id="main-page">
  <div class="homepage-header">
    <div id="homepageCarousel"
         class="carousel slide homepage-carousel swipe-carousel"
         data-interval="2000" data-ride="carousel">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
        <?php
        $index = 0;

        foreach ($data['header_slider'] as $row) {
          echo '<li data-target="#homepageCarousel" data-slide-to="' . $index . '"
                class="carousel-round ';
          if ($index == 0) {
            echo ' active';
          }
          echo '"></li>';
          $index = $index + 1;
        }
        ?>
      </ol>

      <!-- Carousel items -->
      <div class="carousel-inner">


        <?php
        $index = 0;

        foreach ($data['header_slider'] as $row) {
          echo '<div class="item';
          if ($index == 0) {
            echo ' active ';
          }

          echo '">
                  <div class="carousel-image carousel-image-slide' . $index . '" style="background-image: url(' . IMAGEPATH . $row['img'] . ') ">
                  </div>
                  </div>';
          $index = $index + 1;
        }
        ?>

      </div>
    </div>
    <div class="homepage-header-title-wrapper left-padding container">
      <div class="homepage-header-title">
        <?php
        echo $data['header_title'];
        ?>
      </div>
    </div>
  </div>


  <div class="philosophy container box-vmargin left-padding">


    <?php
    include 'application/connection.php';
    $q = "SELECT * FROM philosophy WHERE lid='".$lang."'";
    $query = $mysqli->query($q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        echo '<div class="philosophy-text">' . $r['text'] . '</div>';
      }
    }


    ?>


  </div>

  <div class="homepage-properties ">
    <div class="homepage-properties-row ">
      <div class="properties-side left-side">
        <div class="left-side-bg"
             style="background-image: url(<?php echo IMAGEPATH . $data['property_image'] ?>)"></div>
      </div>

      <div class="properties-side right-side left-padding">

        <?php

        echo '<h3 class="property-title left-padding ">' . $data['property_title'] . '</h3>';

        $index = 1;
        foreach ($data['property_items'] as $row) {
          echo '<div class="property-item property-item' . $index . '">
              <div class="property-item-image" style="background-image: url(' . IMAGEPATH . $row['icon'] . ')"></div>
              <h4 class="property-item-title">' . $row['title'] . '</h4>
              <div class="property-item-description">' . $row['description'] . '</div>
              </div>';

          $index = $index + 1;
        }
        ?>

      </div>
    </div>
  </div>

  <?php
    echo '<div class="homepage-products-wrapper" style="background-image:url('.IMAGEPATH.$data['gallery_bg']['path'].')">';
    ?>

  <div class="homepage-products-bg">
    <div class="homepage-products container box-same-vpadding">
      <div class="homepage-gallery-title">
        <p><?php echo $data['gallery_name']; ?></p>

      </div>
      <div class="homepage-products-row row">
          <?php
          $index = 1;

          foreach ($data['gallery'] as $row) {

              if ($row['panel_displaying'] == '1') {
                  echo '<div class="item-wrapper col-sm-';
                  if (($index - 3) % 5 == 0 or ($index - 4) % 5 == 0) {
                      $size = 3;
                  } else {
                      $size = 6;
                  }
                  echo $size.'">
                <a href="#imageNavMenu" class="imageNavMenuLink  item-'.$row['id'].'" data-toggle="modal">
                <div class="homepage-product-item item-'.$index.'" style="background-image: url('.IMAGEPATH.$row['path'].')">
                </div>
                </a>
              </div>';

                  $index = $index + 1;
              }
          }
          /**
           * foreach ($data['gallery']['items'] as $row) {
           * echo '<div class="item-wrapper col-sm-';
           * if(($index-3)%5 == 0 or ($index-4)%5==0) {
           * $size = 3;
           * } else {
           * $size = 6;
           * }
           * echo $size.'">
           * <div class="homepage-product-item item-'.$index.'" style="background-image: url('.IMAGEPATH.$row['image'].')">
           * <div class="item-image">
           * <a href="/products/'.$row['name'].'" class="link-to-product">'.$row['title'].'
           * <span class="arrow">›</span>
           * </a>
           * </div>
           * </div>
           * </div>';
           *
           * $index = $index + 1;
           * }*/


          ?>
      </div>
    </div>
  </div>
  </div>
</main>

<div id="imageNavMenu" class="modal fade image-nav-menu "
     style="display: none;">
  <div class="modal-dialog aside-modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×
        </button>
        <div class="carousel-wrapper">
          <div id="homepageGalleryCarousel"
               class="carousel slide product-carousel-top">
            <div class="carousel-inner">
              <?php

              if (!empty($data['gallery'])) {
                $activeIndex = TRUE;
                foreach ($data['gallery'] as $row) {
                  echo '<div class="item large-item item-'.$row['id'].' ';
                  if ($activeIndex) {
                    echo ' active ';
                    $activeIndex = FALSE;
                  }
                  echo '" style="background-image: url(' . IMAGEPATH . $row['path'] . ')"></div>';
                }
              }
              ?>
            </div>
          </div>
          <div class="clearfix">
            <div id="thumbcarousel"
                 class="carousel slide homepage-gallery-carousel carousel-showmanymoveone">
              <div class="carousel-inner">
                <?php
                $activeIndex = TRUE;
                $itemIndex = 0;
                if (!empty($data['gallery']) and count(
                    $data['gallery']
                  ) > 1
                ) {
                  foreach ($data['gallery'] as $row) {
                    echo '<div class="item ';
                    if ($activeIndex) {
                      echo ' active';
                      $activeIndex = FALSE;
                    }
                    echo ' item-'.$row['id'].'">';

                    echo '<div data-target="#homepageGalleryCarousel" data-slide-to="';
                    echo $itemIndex;
                    echo '" class="thumb thumb-image item-'.$row['id'].'" style="background-image:url(' . IMAGEPATH . $row['path'] . ')"></div>';
                    $itemIndex = $itemIndex + 1;

                    echo '</div>';

                  }
                }
                ?>

              </div>

              <?php
              if (!empty($data['gallery']) and count(
                  $data['gallery']
                ) > 3
              ) {
                ?>
                <a class="left carousel-control" href="#thumbcarousel"
                   role="button" data-slide="prev">
                            <span
                                class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control"
                   href="#thumbcarousel"
                   role="button" data-slide="next">
                            <span
                                class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <?php
              }
              ?>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
