<main class="product">

  <h1 class="page-header container text-capitalize left-padding left-padding"><?php echo $data[0]['title']; ?></h1>
  <div class="product-menu-wrapper col-sm-3 left-padding">
    <div class="product-menu floating">
      <ul>
          <?php

          $data;
          $debug = true;
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

              echo '" href="/produkte/'.$row['name'].'">'.$row['title'].'</a>';

              if ($routes[2] == $row['name'] and $routes[2] !== $data[0]['name']) {
                  $c = $data['menu']['category'];
                  $link = "/produkte/".$row['name'];
                  if ($c !== "") {
                      while ($c['next'] !== "") {
                          echo '<ul>';
                          echo '<li><a href="'.$link.'/'.$c['next']['name'].'">'.$c['next']['title'].'</a>';
                          $link = $link.'/'.$c['next']['name'];
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

                      echo '<a href="'.$link.'/'.$row['name'].'">'.$row['title'].'</a></li>';
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
    <div>

      <div class="product-main">

        <!-- Gallery carousel -->
          <?php if (!empty($data['gallery'])) { ?>
            <div class="carousel-wrapper">
         <!--     <div id="carousel"
                   class="carousel slide product-carousel product-carousel-top swipe-carousel">
                <div class="carousel-inner">
                    <?php
                   /* $activeIndex = true;
                    if (!empty($data['gallery'])) {
                        foreach ($data['gallery'] as $row) {
                            echo '<div class="item large-item ';
                            if ($activeIndex) {
                                echo ' active';
                                $activeIndex = false;
                            }
                            echo '" style="background-image: url('.IMAGEPATH.$row['path'].')"></div>';
                        }
                    }*/
                    ?>
                </div>
              </div> -->
              <div class="clearfix">


                <div class="slider-prod">
                  <?php
                   if (!empty($data['gallery'])) {
                        foreach ($data['gallery'] as $row) {
                            echo '<div class="item-gallery';

                            echo '" ">

<div class="item-image" style="background-image: url('.IMAGEPATH.$row['path'].')"> </div>

</div>';
                        }
                    }
                  ?>
                </div>


              </div>
            </div>
          <?php } ?>

        <!-- Description of the product-->
        <div
            class="product-description-wrapper product-full-description-wrapper">
            <?php

            echo '<div class="product-description product-full-description">'.$data[0]['description'].'</div>';
            echo '<p class="arrow-down 	glyphicon glyphicon-menu-down text-center"></p>';
            ?>
        </div>



      </div>
    </div>
  </div>

  <div class="technische-container">
    <div class="container model-container">
              <!--Colour-->
          <?php if (!empty($data['colours'])) { ?>
            <div class="product-colour-wrapper ">
              <h2 class="colour-title">FARBVARIANTEN:</h2>
              <div class="colour-palette row">
                  <?php
                  foreach ($data['colours'] as $row) {
                      echo '<div class="colour-item  col-md-2 col-sm-4 col-xs-6"><div class="colour-block" style="background-image:url('.IMAGEPATH.$row['image'].')"></div>';
                      echo '<p class="colour-name">'.$row['name'].'</p></div>';
                  }
                  ?>
              </div>
            </div>
          <?php } ?>
      <h2 class="size-title ">MODELLE UND GRÖßEN</h2>

      <div class="row technische-row size-row">

          <?php
          echo '<div class="product-sizes sizes-rectangles col-xs-12 col-mb-4';
          echo '">';
          echo $data[0]['size_markup'];
          echo '</div>';
          ?>


          <?php
          echo '<div class="product-sizes col-xs-12 right-padding col-mb-8';
          echo '">';
          ?>

          <?php
          echo '<table cellpadding="4">';
          echo '<tr>
                    <th>Modell</th>
                    <th>Abmessungen (mm)</th>
                    <th>Beheizte Raumgröße (m² / m3)</th>';

          if ($data[0]['has_height'] == '1') {
              echo '<th>Einbauhöhe (m)</th>';
          }


          echo '<th>Leistung (Watt +/-5%)</th>
                    
                    <th>Gewicht  (kg)</th>
                  </tr>';
          $ind = 1;
          foreach ($data['sizes'] as $row) {
              echo '';
              echo '<tr class="row-'.$ind.'">';
              echo '<td>'.$row['modell'].'</td>';
              echo '<td>'.$row['sizex'].' x '.$row['sizey'];
              $ind = $ind + 1;
              if ($row['sizez'] !== '0') {
                  echo ' x '.$row['sizez'];
              }
              echo '</td>';

              echo '<td>'.$row['raumgrose'].'</td> ';

              if ($data[0]['has_height'] == '1') {
                  echo '<td>'.$row['einbauhohe'].'</td>';
              }
              echo '<td>'.$row['leistung'].'</td>';
              echo '<td>'.$row['gewicht'].'</td>';
              echo '</tr>';
          }

          echo '</table>';
          ?>

      </div>


    </div>
  </div>

  <div class="container daten-container">
    <div class="row technische-row">
      <!--Technische daten table-->
      <div class="product-technische-daten product-main">

        <ul class="nav nav-pills">
          <li class="active">
            <a class="tab-button" href="#1a" data-toggle="tab">TECHNISCHE
              DATEN</a>
          </li>
          <li><a class="tab-button" href="#2a"
                 data-toggle="tab">DOWNLOAD</a>
          </li>
        </ul>

        <div class="tab-content clearfix">
          <div class="tab-pane active" id="1a">
            <!-- <h3 class="technische-daten-title">TECHNISCHE DATEN</h3> -->

            <table class="features-product-table">
                <?php
                if (isset($data['features'])) {
                    foreach ($data['features'] as $row) {
                        echo ' <tr><td>'.$row['feature'];


                        echo '</td>';
                        echo ' <td>'.$row['value'].'</td></tr>';
                    }
                }


                ?>
            </table>
              <?php

              if (isset($data['garantie'])) {
                  echo '<a class="garantie-title" href="#garantieModal" data-toggle="modal">'.$data['garantie']['title'].'</a>';
              }
              ?>
          </div>
          <div class="tab-pane" id="2a">
              <h2>Documents</h2>

             <?php
              if (isset($data['doc'])) {
                  foreach ($data['doc'] as $doc) {
                      echo '<a class="document-link" href="'.DOCPATH.$doc['path'].'" download>'.$doc['name'].'</a>';
                  }
              }

              ?>
          </div>
        </div>


      </div>
    </div>
    <div class="row technische-row">
      <div class="product-thermostat">
          <?php
          if (isset($data['principles'])) {
              foreach ($data['principles'] as $row) {
                  echo '
                      <div class="col-xs-12 col-sm-6 product-thermostat-item">
                        <div class="product-thermostat-image" style="background-image: url('.IMAGEPATH.$row['image'].')"></div>
                        <div class="product-thermostat-title">
                        '.$row['title'].'
                        </div>
                        <div class="product-thermostat-description">
                        '.$row['description'].'
                        </div>
                      </div>';
              }
          }
          if ($data[0]['has_thermostat'] == '1') {
              foreach ($data['thermostats_info'] as $row) {
                  echo '
                      <div class="col-xs-12 col-sm-6 product-thermostat-item">
                        <div class="product-thermostat-image" style="background-image: url('.IMAGEPATH.$row['image'].')"></div>
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
      <div class="product-similar">
        <!--Similar product-->

        <div class="similar-products-wrapper">
          <div class="similar-products">
            <h2 class="similar-products-title">WEITERE PRODUKTE</h2>
            <div class="row">
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
                <h2 class="thermostats-products-title  ">Zur Steuerung unserer Infrarot-Heizungssysteme empfehlen wir die folgenden Warmup
Thermostate
                </h2>
                <div class="row ">
                    <?php
                    include 'application/connection.php';
                    $q = "SELECT * FROM thermostat WHERE parent_id='7'";
                    $query = $mysqli->query($q);

                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<a class="col-sm-4 col-xs-12 thermostat-product-item" href="/produkte/thermostats/'.$row['name'].'"><div class="thermostat-product-image"><img src="'.IMAGEPATH.$row['image'].'" alt="thermostat"></div>';
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
<div id="garantieModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog aside-modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true"></button>
                   <?php

              if (isset($data['garantie'])) {
                  echo '<div>'.$data['garantie']['text'].'</div>';
              }
              ?>
        </div>
      </div>
    </div>
  </div>
</main>
