<main class="product">

  <h1 class="page-header container text-capitalize">PRODUCT</h1>

  <div class=" container right-padding">
    <div class="row">
      <div class="product-menu-wrapper col-sm-3">
        <div class="product-menu floating">
          <ul>
              <?php

              $data;
              $debug = true;
              $routes = explode('/', $_SERVER['REQUEST_URI']);
              $last = end($routes);

              foreach ($data['menu']['root'] as $row) {
                  echo '<li>';
                  if ($routes[2] == $row['name']) {
                      echo '<span class="glyphicon glyphicon-chevron-right"></span>';
                  }

                  echo '<a class="product-menu-item ';
                  if ($routes[2] == $row['name']) {
                      echo 'bold-item';
                  }
                  echo '" href="/products/'.$row['name'].'">'.$row['title'].'</a>';
                  if ($routes[2] == $row['name']) {
                      $c = $data['menu']['category'];
                      $link = "/products/".$row['name'];
                      while ($c['next'] !== "") {
                          echo '<ul>';
                          echo '<li><a href="'.$link.'/'.$c['next']['name'].'">'.$c['next']['title'].'</a>';
                          $link = $link.'/'.$c['next']['name'];
                          $c = $c['next'];
                      }

                      echo '<ul>';
                      $n = $data['menu']['neighbours'];
                      foreach ($n as $row) {
                          echo '<li>';

                          if ($last == $row['name']) {
                              echo '<span class="glyphicon glyphicon-chevron-right"></span>';
                          }

                          echo '<a href="'.$link.'/'.$row['name'].'">'.$row['title'].'</a></li>';
                      }
                      echo '</ul>';

                      $c = $data['menu']['category'];
                      while ($c['next'] !== "") {
                          echo '</ul>';
                          $c = $c['next'];
                      }
                  }
                  echo '</li>';
              }
              ?>

          </ul>
        </div>
      </div>

      <div class="product-main col-sm-9">

        <!-- Gallery carousel -->
        <div class="carousel-wrapper">
          <div id="carousel"
               class="carousel slide product-carousel product-carousel-top swipe-carousel">
            <div class="carousel-inner">
                <?php
                $activeIndex = true;
                if (!empty($data['gallery'])) {
                    foreach ($data['gallery'] as $row) {
                        echo '<div class="item large-item ';
                        if ($activeIndex) {
                            echo ' active';
                            $activeIndex = false;
                        }
                        echo '" style="background-image: url('.IMAGEPATH.$row['path'].')"></div>';
                    }
                }
                ?>
            </div>
          </div>
          <div class="clearfix">
            <div id="thumbcarousel"
                 class="carousel slide product-carousel carousel-showmanymoveone">
              <div class="carousel-inner">
                  <?php
                  $activeIndex = true;
                  $itemIndex = 0;
                  if (!empty($data['gallery']) and count(
                      $data['gallery']
                    ) > 1
                  ) {
                      foreach ($data['gallery'] as $row) {
                          echo '<div class="item ';
                          if ($activeIndex) {
                              echo 'active';
                              $activeIndex = false;
                          }
                          echo '">';

                          echo '<div data-target="#carousel" data-slide-to="';
                          echo $itemIndex;
                          echo '" class="thumb thumb-image " style="background-image:url('.IMAGEPATH.$row['path'].')"></div>';
                          $itemIndex = $itemIndex + 1;

                          echo '</div>';

                      }
                  }
                  ?>

              </div>

                <?php
                if (!empty($data['gallery']) and count($data['gallery']) > 3) {
                    ?>
                  <a class="left carousel-control" href="#thumbcarousel"
                     role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#thumbcarousel"
                     role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                    <?php
                }
                ?>

            </div>
          </div>
        </div>

        <!-- Name of the product-->
        <div class="product-title-wrapper">
            <?php
            echo '<h3 class="product-title">'.$data[0]['title'].'</h3>';
            ?>
        </div>

        <!-- Description of the product-->
        <div class="product-description-wrapper">
            <?php
            echo '<p class="product-description product-full-description">'.$data[0]['description'].'</p>';
            ?>
        </div>

        <!--Colour-->
        <div class="product-colour-wrapper">
          <h3 class="colour-title">COLOUR</h3>
          <div class="colour-palette">
              <?php
              if (!empty($data['colours'])) {
                  foreach ($data['colours'] as $row) {
                      echo '<div class="colour-item"><div class="colour-block" style="background-image:url('.IMAGEPATH.$row['image'].')"></div>';
                      echo '<p class="colour-name">'.$row['name'].'</p></div>';
                  }
              }
              ?>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="technische-container">
    <div class="container">
      <h4 class="size-title col-xs-9 ">SIZE</h4>

      <div class="row technische-row">
        <div class="product-sizes col-xs-9 col-md-5">

            <?php

            echo '<table>';
            echo '<tr>
                    <th>Ammessung (cantemiters)</th>
                    <th>Leistung (watt)</th> 
                    <th>Gewicht (kilograms)</th>
                    <th>Warmeflache (square meter)</th>
                  </tr>';
            $ind = 1;
            foreach ($data['sizes'] as $row) {
                echo '<tr class="row-'.$ind.'">
                    <td>'.$row['sizex'].'x'.$row['sizey'];
                $ind = $ind + 1;
                if ($row['sizez'] !== '0') {
                    echo 'x'.$row['sizez'];
                }
                echo '</td>
                    <td>'.$row['leistung'].'</td> 
                    <td>'.$row['gewicht'].'</td>
                    <td>'.$row['warmeflache'].'</td>
                  </tr>';
            }

            echo '</table>';
            ?>

        </div>
        <div class="product-sizes sizes-rectangles col-xs-9 col-md-4">

          <div id="row7" class="rectangle"
               style="width:180px;height:90px;bottom:0;left:0;">
            180x90
          </div>

          <div id="row6" class="rectangle"
               style="width:75px;height:180px;bottom:0;left:180px;">
            180x75
          </div>
          <div id="row5" class="rectangle"
               style="width:150px;height:90px;bottom:90px;left:0;">
            150x90
          </div>
          <div id="row4" class="rectangle"
               style="width:150px;height:40px;bottom:180px;left:0;">
            150x40
          </div>
          <div id="row3" class="rectangle"
               style="width:90px;height:60px;bottom:220px;left:0;">
            60x90
          </div>

          <div id="row2" class="rectangle"
               style="width:60px;height:60px;bottom:220px;left:90px;">60x60
          </div>

          <div id="row1" class="rectangle"
               style="width:90px;height:40px;bottom:280px;left:0;">
            40x90
          </div>
        </div>


      </div>
    </div>

    <div class="container">
      <div class="row technische-row">
        <!--Technische daten table-->
        <div class="product-technische-daten product-main col-xs-12 col-sm-9">

          <ul class="nav nav-pills">
            <li class="active">
              <a class="tab-button" href="#1a" data-toggle="tab">QUALITY</a>
            </li>
            <li><a class="tab-button" href="#2a"
                   data-toggle="tab">DOWNLOAD</a>
            </li>
          </ul>

          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
              <!-- <h3 class="technische-daten-title">TECHNISCHE DATEN</h3> -->

              <table>
                  <?php
                  foreach ($data[0] as $key => $value) {
                      if ($key == 'vorne' or $key == 'hintent' or $key == 'warmeeffekt' or $key == 'schutzgrad' or $key == 'zertifikate') {
                          echo ' <tr><td>'.ucfirst(
                              str_replace("_", " ", $key)
                            ).'</td>';
                          echo ' <td>'.$value.'</td></tr>';
                      }
                  }
                  ?>
              </table>
            </div>
            <div class="tab-pane" id="2a">
              <h3>Documents</h3>
            </div>
          </div>


        </div>
      </div>
      <div class="row technishe-row">
        <div class="product-thermostat col-xs-12 col-sm-9">
            <?php
            include 'application/connection.php';

            $query = $mysqli->query(
              "SELECT * FROM product_thermostat"
            );

            if ($query) {
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '
                      <div class="col-xs-12 col-sm-6 product-thermostat-item">
                        <div class="product-thermostat-image"><img src="'.IMAGEPATH.$row['image'].'" alt="thermostat"></div>
                        <div class="product-thermostat-title">
                        '.$row['title'].'
                        </div>
                        <div class="product-thermostat-description">
                        '.$row['description'].'
                        </div>
                      </div>';
                }
            }
            ?>

        </div>
      </div>


    </div>
  </div>


  <div class="container">
    <div class="row similar-row">
      <div class="product-similar col-xs-12 col-sm-9">
        <!--Similar product-->

        <div class="similar-products-wrapper">
          <div class="similar-products">
            <h3 class="similar-products-title">PRODUCTE</h3>
            <div class="row right-padding">
                <?php
                include 'application/connection.php';
                $routes = explode('/', $_SERVER['REQUEST_URI']);
                $last = end($routes);
                $current_pid_q = "SELECT parent_id FROM products  WHERE name='".$last."'";
                $current_pid = mysqli_fetch_assoc(
                  $mysqli->query($current_pid_q)
                );
                $q = "SELECT * FROM products  WHERE parent_id='".$current_pid['parent_id']."' AND name NOT IN ('".$last."')";
                $query = $mysqli->query($q);
                $similars = [];
                if ($query) {
                    $ind = 1;
                    while ($r = mysqli_fetch_assoc($query) and $ind < 4) {
                        echo '<a class="col-sm-4 col-xs-12 similar-product-item" href="'.str_replace(
                            $last,
                            $r['name'],
                            $_SERVER['REQUEST_URI']
                          ).'"><div class="similar-product-image" style="background-image: url('.IMAGEPATH.$r['image'].')"></div>';
                        echo '<h4 class="similar-product-title">'.$r['title'].'</h4>';
                        echo '<div class="similar-product-description">'.$r['short_description'].'</div></a>';
                        $ind = $ind + 1;
                    }
                }


                ?>
            </div>
          </div>
        </div>

        <div class="row thermostats-row">
      <div class="product-thermostats">
        <!--Similar product-->

        <div class="thermostats-products-wrapper">
          <div class="thermostats-products">
            <h3 class="thermostats-products-title">FUR STEUERUNG UNSERE HEIZUNGSSYSTEME EMPFEHLEN WIR WARM UPT</h3>
            <div class="row right-padding">
                <?php
                include 'application/connection.php';
                $q = "SELECT * FROM thermostat";
                $query = $mysqli->query($q);

        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<a class="col-sm-4 col-xs-12 thermostat-product-item" href="/products/thermostats/'.$row['name'].'"><div class="thermostat-product-image"><img src="'.IMAGEPATH.$row['image'].'" alt="thermostat"></div>';
                        echo '<h4 class="thermostat-product-title">'.$row['title'].'</h4>';
                        echo '<div class="thermostat-product-description">'.$row['short_description'].'</div></a>';
            }
        }


                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

</main>
