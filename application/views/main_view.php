<main>
  <div class="homepage-header">
    <div id="homepageCarousel" class="carousel slide homepage-carousel"
         data-interval="3000" data-ride="carousel">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
          <?php
            $index = 0;

            foreach ($data['header']['slider'] as $row) {
                echo '<li data-target="#homepageCarousel" data-slide-to="'.$index.'"
                class="carousel-round ';
                if ($index==0) {
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

            foreach ($data['header']['slider'] as $row) {
              echo '<div class="item';
              if ($index==0) {
                echo ' active ';
              }

              echo '">
                  <div class="carousel-image carousel-image-slide'.$index.'" style="background-image: url('.IMAGEPATH.$row['img'].') ">
                  </div>
                  </div>';
              $index = $index + 1;
            }
          ?>

      </div>
    </div>
    <div class="homepage-header-title-wrapper container">
      <h2 class="homepage-header-title">
        <?php
          echo $data['header']['title'];
        ?>
      </h2>
    </div>
  </div>


  <?php
    include("application/views/fragments/philosophy.php");
  ?>

  <div class="homepage-properties">
    <div class="homepage-properties-row">
      <div class="properties-side left-side"></div>
      <div class="properties-side right-side box-mid-margin">

        <?php
            $index = 1;

            foreach ($data['property']['items'] as $row) {
              echo '<div class="property-item property-item'.$index.'">
              <h4 class="property-item-title">'.$row['title'].'</h4>
              <p class="property-item-description">'.$row['description'].'</p>
              </div>';

              $index = $index + 1;
            }
        ?>

      </div>
    </div>
  </div>

  <div class="homepage-products-wrapper">
    <div class="homepage-products-bg">
      <div class="homepage-products container box-same-vpadding">
        <div class="homepage-products-row row">
          <?php
            $index = 1;

            foreach ($data['gallery']['items'] as $row) {
              echo '<div class="item-wrapper col-sm-';
              $size = $row['size']*12;
              echo $size.'">
                <div class="homepage-product-item item-'.$index.'">
                  <div class="item-image">
                    <a href="'.$row['link'].'" class="link-to-product">'.$row['title'].'
                      <span class="arrow">›</span>
                    </a>
                  </div>
                </div>
              </div>';

              $index = $index + 1;
            }
          ?>

        </div>
      </div>
    </div>
  </div>

</main>
