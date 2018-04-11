<main class="product">

  <h1 class="page-header container text-capitalize left-padding left-padding"><?php echo $data[0]['title']; ?></h1>
  <?php
  //edit and delete links
  if (isAuth()) {
    echo '<div class="container produkte-del box-small-margin "><a href="#delConfirm"
         data-toggle="modal" class="glyphicon glyphicon-trash"> Delete this produkte</a></div>';
    echo '<div class="container produkte-del box-small-margin "><a href="' . $_SERVER['REQUEST_URI'] . '/edit"
           class="glyphicon glyphicon-pencil"> Edit this produkte</a></div>';
  }
  ?>
  <!-- menu -->
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

          if ($routes[2] == $row['name'] and $routes[2] !== $data[0]['name']) {
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

  <div class="container left-padding">
    <div>

      <div class="product-main">
        <!-- Gallery carousel -->
        <?php if (!empty($data['gallery'])) { ?>
          <div class="carousel-wrapper">
            <div id="carousel"
                 class="carousel slide product-carousel product-carousel-top swipe-carousel">
              <div class="carousel-inner">
                <?php
                $activeIndex = TRUE;
                if (!empty($data['gallery'])) {
                  foreach ($data['gallery'] as $row) {
                    echo '<div class="item large-item ';
                    if ($activeIndex) {
                      echo ' active';
                      $activeIndex = FALSE;
                    }

                    $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $row['path'];
                    if (is_file($row_path)) {
                      echo '" style="background-image: url(' . IMAGEPATH . $row['path'] . ')"';
                    }

                    echo '></div>';
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
                  $activeIndex = TRUE;
                  $itemIndex = 0;
                  if (!empty($data['gallery']) and count($data['gallery']) > 1) {
                    foreach ($data['gallery'] as $row) {
                      echo '<div class="item ';
                      if ($activeIndex) {
                        echo 'active';
                        $activeIndex = FALSE;
                      }
                      echo '">';

                      echo '<div data-target="#carousel" data-slide-to="';
                      echo $itemIndex;
                      echo '" class="thumb thumb-image"';

                      $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $row['path'];
                      if (is_file($row_path)) {
                        echo 'style="background-image:url(' . IMAGEPATH . $row['path'] . ')"';
                      }


                      echo '></div>';
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
        <?php } ?>
      </div>

      <!-- Description of the product-->
      <div
          class="product-description-wrapper product-full-description-wrapper">
        <?php
        echo '<div class="product-description product-full-description">' . $data[0]['description'] . '</div>';
        echo '<p class="arrow-down 	glyphicon glyphicon-menu-down text-center"></p>';
        ?>
      </div>

    </div>
  </div>

  <div class="technische-container">
    <div class="container model-container">
      <!--Colour-->
      <?php if (!empty($data['colours'])) { ?>
        <div class="product-colour-wrapper ">
          <?php
          if ($lang == 2) {
            echo '<h2 class="colour-title">COLOR VARIATIONS:</h2>';
          }
          else {
            echo '<h2 class="colour-title">FARBVARIANTEN:</h2>';
          }
          ?>

          <div class="colour-palette row">
            <?php
            foreach ($data['colours'] as $row) {
              echo '<div class="colour-item  col-md-2 col-sm-4 col-xs-6"><div class="colour-block"';

              $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $row['image'];
              if (is_file($row_path)) {
                echo 'style="background-image:url(' . IMAGEPATH . $row['image'] . ')"';
              }

              echo '></div>';

              if ($lang == 2) {
                echo '<p class="colour-name">' . $row['en_name'] . '</p>';
              }
              else {
                echo '<p class="colour-name">' . $row['name'] . '</p>';
              }


              echo '</div>';
            }
            ?>
          </div>
        </div>
      <?php } ?>

      <?php
      if ($lang == 2) {
        echo '<h2 class="size-title ">MODELS AND SIZES</h2>';
      }
      else {
        echo '<h2 class="size-title ">MODELLE UND GRÖßEN</h2>';
      }
      ?>


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


        if ($lang == 2) {
          echo '<tr><th>Model</th><th>Dimensions (mm)</th><th>Heated room size (m² / m3)</th>';

          if ($data[0]['has_height'] == '1') {
            echo '<th>Installation height (m)</th>';
          }

          echo '<th>Power (Watt +/-5%)</th><th>Weight  (kg)</th></tr>';
        }
        else {
          echo '<tr><th>Modell</th><th>Abmessungen (mm)</th><th>Beheizte Raumgröße (m² / m3)</th>';

          if ($data[0]['has_height'] == '1') {
            echo '<th>Einbauhöhe (m)</th>';
          }

          echo '<th>Leistung (Watt +/-5%)</th><th>Gewicht  (kg)</th></tr>';
        }


        $ind = 1;
        foreach ($data['sizes'] as $row) {
          echo '';
          echo '<tr class="row-' . $ind . '">';
          echo '<td>' . $row['modell'] . '</td>';
          echo '<td>' . $row['sizex'] . ' x ' . $row['sizey'];
          $ind = $ind + 1;
          if ($row['sizez'] !== '0') {
            echo ' x ' . $row['sizez'];
          }
          echo '</td>';

          echo '<td>' . $row['raumgrose'] . '</td> ';

          if ($data[0]['has_height'] == '1') {
            echo '<td>' . $row['einbauhohe'] . '</td>';
          }
          echo '<td>' . $row['leistung'] . '</td>';
          echo '<td>' . $row['gewicht'] . '</td>';
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

            <?php
            if ($lang == 2) {
              echo '<a class="tab-button" href="#1a" data-toggle="tab">TECHNICAL SPECIFICATIONS</a>';
            }
            else {
              echo '<a class="tab-button" href="#1a" data-toggle="tab">TECHNISCHE DATEN</a>';
            }


            ?>


          </li>
          <li><a class="tab-button" href="#2a"
                 data-toggle="tab">DOWNLOAD</a>
          </li>
        </ul>

        <div class="tab-content clearfix">
          <div class="tab-pane active" id="1a">
            <table class="features-product-table">
              <?php
              if (isset($data['features'])) {
                foreach ($data['features'] as $row) {
                  echo ' <tr><td>' . $row['feature'];


                  echo '</td>';
                  echo ' <td>' . $row['value'] . '</td></tr>';
                }
              }


              ?>
            </table>
            <?php

            if (isset($data['garantie'])) {
              echo '<a class="garantie-title" href="#garantieModal" data-toggle="modal">' . $data['garantie']['title'] . '</a>';
            }
            ?>
          </div>
          <div class="tab-pane" id="2a">
            <h2>Documents</h2>

            <?php
            if (isset($data['doc'])) {
              foreach ($data['doc'] as $doc) {
                echo '<a class="document-link" href="' . DOCPATH . $doc['path'] . '" download>' . $doc['name'] . '</a>';
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

        if (isset($data['energie'])) {
          echo '<div class="col-xs-12 col-sm-4 product-thermostat-item">
                        <div class="product-thermostat-image" style="background-image: url(';

          $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $data['energie']['image'];
          if (is_file($row_path)) {
            echo IMAGEPATH . $data['energie']['image'];
          }

          echo ')"></div>';
          if (isset($data['energie']['title'])) {
            echo ' <div class="product-thermostat-title">
                   ' . $data['energie']['title'] . '
                   </div>
                 ';
          }

          if (isset($data['energie']['description'])) {
            echo '
                        <div class="product-thermostat-description">
                        ' . $data['energie']['description'] . '
                        </div>
                      ';
          }
          echo '</div>';

        }
        if (isset($data['principle_info'])) {
          foreach ($data['principle_info'] as $row) {
            echo '
                      <div class="col-xs-12 col-sm-4 product-thermostat-item">
                        <div class="product-thermostat-image" style="background-image: url(';

            $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $row['image'];
            if (is_file($row_path)) {
              echo IMAGEPATH . $row['image'];
            }

            echo ')"></div>
                        <div class="product-thermostat-title">
                        ' . $row['title'] . '
                        </div>
                        <div class="product-thermostat-description">
                        ' . $row['description'] . '
                        </div>
                      </div>';
          }
        }

        if ($data[0]['has_thermostat'] == '1') {
          foreach ($data['thermostats_info'] as $row) {
            echo '
                      <div class="col-xs-12 col-sm-4 product-thermostat-item">
                        <div class="product-thermostat-image" style="background-image: url(';

            $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $row['image'];
            if (is_file($row_path)) {
              echo IMAGEPATH . $row['image'];
            }

            echo ')"></div>
                        <div class="product-thermostat-title">
                        ' . $row['title'] . '
                        </div>
                        <div class="product-thermostat-description">
                        ' . $row['description'] . '
                        </div>
                      </div>';
          }
        }
        ?>
      </div>
    </div>
  </div>
  </div>

  <!-- other products -->
  <div class="container">
    <div class="row similar-row">
      <div class="product-similar">
        <!--Similar product-->

        <div class="similar-products-wrapper">
          <div class="similar-products">

            <?php
            if ($lang == 2) {
              echo '<h2 class="similar-products-title">FURTHER PRODUCTS</h2>';
            }
            else {
              echo '<h2 class="similar-products-title">WEITERE PRODUKTE</h2>';
            }
            ?>

            <div class="row">
              <?php
              include 'application/connection.php';
              $routes = explode('/', $_SERVER['REQUEST_URI']);
              $last = end($routes);
              $current_pid_q = "SELECT parent_id FROM products  WHERE name='" . $last . "'";
              $current_pid = mysqli_fetch_assoc(
                $mysqli->query($current_pid_q)
              );
              $q = "SELECT * FROM products  WHERE parent_id='" . $current_pid['parent_id'] . "' AND name NOT IN ('" . $last . "') AND lid='".$lang."'";
              $query = $mysqli->query($q);
              $similars = [];
              if ($query) {
                $ind = 1;
                while ($r = mysqli_fetch_assoc($query) and $ind < 4) {
                  echo '<a class="col-sm-4 col-xs-12 similar-product-item" href="' . str_replace(
                      $last,
                      $r['name'],
                      $_SERVER['REQUEST_URI']
                    ) . '"><div class="similar-product-image"';

                  $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $r['image'];
                  if (is_file($row_path)) {
                    echo ' style="background-image: url(' . IMAGEPATH . $r['image'] . ')"';
                  }

                  echo '></div>';
                  echo '<h4 class="similar-product-title">' . $r['title'] . '</h4>';
                  echo '<div class="similar-product-description">' . $r['short_description'] . '</div></a>';
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

                <?php
                if ($lang == 2) {
                  echo '<h2 class="thermostats-products-title  ">To control our Infrared heating systems we recommend the following warmup thermostats
                </h2>';
                }
                else {
                  echo '<h2 class="thermostats-products-title  ">Zur Steuerung unserer
                  Infrarot-Heizungssysteme empfehlen wir die folgenden Warmup
                  Thermostate
                </h2>';
                }
                ?>

                <div class="row ">
                  <?php
                  include 'application/connection.php';
                  $q = "SELECT * FROM thermostat WHERE has_qualities=1 AND lid='" . $lang . "'";
                  $query = $mysqli->query($q);

                  if ($query) {

                    $t = 0;
                    while ($row = mysqli_fetch_assoc($query) and $t < 3) {
                      $t = $t + 1;
                      if ($lang == 2) {
                        echo '<a class="col-sm-4 col-xs-12 thermostat-product-item" href="/products/thermostats/' . $row['name'] . '">';
                      }
                      else {
                        echo '<a class="col-sm-4 col-xs-12 thermostat-product-item" href="/produkte/thermostats/' . $row['name'] . '">';
                      }

                      echo '<div class="thermostat-product-image"><img src="';

                      $row_path = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $row['image'];
                      if (is_file($row_path)) {
                        echo IMAGEPATH . $row['image'];
                      }

                      echo '" alt="thermostat"></div>';
                      echo '<h4 class="thermostat-product-title">' . $row['title'] . '</h4>';
                      echo '<div class="thermostat-product-description">' . $row['short_description'] . '</div></a>';
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

  <!-- Garantie -->
  <div id="garantieModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog aside-modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close glyphicon glyphicon-remove"
                  data-dismiss="modal" aria-hidden="true"></button>
          <?php
          if (isset($data['garantie'])) {
            echo '<div>' . $data['garantie']['text'] . '</div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
//del
if (isAuth()) {
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
