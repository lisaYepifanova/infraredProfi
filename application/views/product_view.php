<main class="product">

  <h1 class="page-header container text-capitalize">PRODUCT</h1>

  <div class=" container right-padding">
    <div class="row">
      <div class="product-menu-wrapper col-sm-3">
        <div class="product-menu floating">
          <ul>
            <li>Item1</li>
            <li>Item2</li>
            <li>Item3</li>
          </ul>
        </div>
      </div>

      <div class="product-main col-sm-9">

        <!-- Gallery carousel -->
        <div class="carousel-wrapper">
          <div id="carousel" class="carousel slide product-carousel">
            <div class="carousel-inner">
                <?php
                $activeIndex = true;
                foreach ($data['gallery'] as $row) {
                    echo '<div class="item large-item ';
                    if ($activeIndex) {
                        echo ' active';
                        $activeIndex = false;
                    }
                    echo '" style="background-image: url('.IMAGEPATH.$row.')"></div>';
                }
                ?>
            </div>
          </div>
          <div class="clearfix">
            <div id="thumbcarousel" class="carousel slide product-carousel">
              <div class="carousel-inner">
                  <?php
                  $activeIndex = true;
                  $itemIndex = 0;
                  foreach ($data['gallery'] as $row) {
                      if ($itemIndex % 3 == 0) {
                          echo '<div class="item ';
                          if ($activeIndex) {
                              echo 'active';
                              $activeIndex = false;
                          }
                          echo '">';
                      }
                      echo '<div data-target="#carousel" data-slide-to="';
                      echo $itemIndex;
                      echo '" class="thumb thumb-image" style="background-image:url('.IMAGEPATH.$row.')"></div>';
                      $itemIndex = $itemIndex + 1;
                      if ($itemIndex % 3 == 0) {
                          echo '</div>';
                      }
                  }
                  ?>

              </div>
              <a class="left carousel-control" href="#thumbcarousel"
                 role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#thumbcarousel"
                 role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>

        <!-- Name of the product-->
        <div class="product-title-wrapper">
            <?php
            echo '<h2 class="product-title">'.$data['name'].'</h2>';
            ?>
        </div>

        <!-- Description of the product-->
        <div class="product-description-wrapper">
            <?php
            echo '<p class="product-description">'.$data['description'].'</p>';
            ?>
        </div>

        <!--Colour-->
        <div class="product-colour-wrapper">
          <h3 class="colour-title">COLOUR</h3>
          <div class="colour-palette">
              <?php
              foreach ($data['colours'] as $row) {
                  echo '<div class="colour-item"><div class="colour-block" style="background-color:'.$row['colour_code'].'"></div>';
                  echo '<p class="colour-name">'.mb_convert_case($row['colour_code'], MB_CASE_TITLE, "UTF-8").'</p></div>';
              }
              ?>
          </div>
        </div>

        <!--Technische daten table-->
        <div class="product-technische-daten-wrapper">
          <h3 class="technische-daten-title">TECHNISCHE DATEN</h3>
          <table>
              <?php
              foreach ($data['technische_daten'] as $key => $value) {
                  echo ' <tr><td>'.$value['name'].'</td>';
                  echo ' <td>'.$value['value'].'</td></tr>';
              }
              ?>
          </table>
        </div>


      </div>
    </div>

</main>
