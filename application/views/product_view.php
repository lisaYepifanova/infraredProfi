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
                    echo '" style="background-image: url('.IMAGEPATH.$row['path'].')"></div>';
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
                      echo '" class="thumb thumb-image" style="background-image:url('.IMAGEPATH.$row['path'].')"></div>';
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
            echo '<h2 class="product-title">'.$data[0]['title'].'</h2>';
            ?>
        </div>

        <!-- Description of the product-->
        <div class="product-description-wrapper">
            <?php
            echo '<p class="product-description">'.$data[0]['description'].'</p>';
            ?>
        </div>

        <!--Colour-->
        <div class="product-colour-wrapper">
          <h3 class="colour-title">COLOUR</h3>
          <div class="colour-palette">
              <?php
              foreach ($data['colours'] as $row) {
                  echo '<div class="colour-item"><div class="colour-block" style="background-color:'.$row['code'].'"></div>';
                  echo '<p class="colour-name">'.$row['name'].'</p></div>';
              }
              ?>
          </div>
        </div>

        <!--Technische daten table-->
        <div class="product-technische-daten-wrapper">
          <h3 class="technische-daten-title">TECHNISCHE DATEN</h3>
          <table>
              <?php
              foreach ($data[0] as $key => $value) {
                if ($key!=='id' && $key!=='name' && $key!=='parent_id' && $key!=='image' && $key!=='title' && $key!=='description') {
                  echo ' <tr><td>'.ucfirst(str_replace("_", " ", $key)).'</td>';
                  echo ' <td>'.$value.'</td></tr>';
                }

              }
              ?>
          </table>
        </div>


      </div>
    </div>

</main>
