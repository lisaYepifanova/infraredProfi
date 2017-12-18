<main class="product">

  <h1 class="page-header container text-capitalize left-padding"><?php echo $data[0]['title']; ?></h1>
  <div class="product-menu-wrapper col-sm-3 left-padding">
    <div class="product-menu floating">
      <ul>
          <?php
          $data;
          $debug = true;
          $routes = explode('/', $_SERVER['REQUEST_URI']);
          $last = end($routes);

          echo '<h4><a class="product-menu-item" href="/unsere-produkte">UNSERE PRODUKTE</a></h4>';

          foreach ($data['menu']['root'] as $row) {
              echo '<li>';
              if ($routes[2] == $row['name']) {
                  echo '<span class="glyphicon glyphicon-chevron-right"></span>';
              }

              echo '<a class="product-menu-item ';
              if ($routes[2] == $row['name']) {
                  echo 'bold-item';
              }
              echo '" href="/unsere-produkte/'.$row['name'].'">'.$row['title'].'</a>';
              if ($routes[2] == $row['name']) {
                  $c = $data['menu']['category'];
                  $link = "/unsere-produkte/".$row['name'];
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
  <div class=" container left-padding">
    <div class="row">

      <div class="product-main col-sm-12">

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

                  <!-- Description of the product-->
        <div class="product-description-wrapper product-full-description-wrapper">
            <?php

            echo '<div class="product-description product-full-description"><p>'.$data[0]['description'].'</p></div>';
echo '<p class="arrow-down 	glyphicon glyphicon-menu-down text-center"></p>';
            ?>
        </div>

      </div>
    </div>
  </div>
<?php if ($data[0]['has_qualities'] == '1') { ?>
  <div class="technische-thermostat-container technische-container">

    <div class="container daten-container">
      <div class="row">
        <!--Technische daten table-->
        <div class="product-technische-daten product-main">

          <ul class="nav nav-pills">
            <li class="active">
              <a class="tab-button" href="#1a" data-toggle="tab">TECHNISCHE DATEN</a>
            </li>
            <li><a class="tab-button" href="#2a"
                   data-toggle="tab">DOWNLOAD</a>
            </li>
          </ul>

          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
              <!-- <h3 class="technische-daten-title">TECHNISCHE DATEN</h3> -->

              <div class="technische-thermostat-daten">
                <table>
                    <?php
                    foreach ($data[0] as $key => $value) {
                        if (($key !== 'id' and $key !== 'has_qualities' and $key !== 'has_similar_products' and $key !== 'name' and $key !== 'title' and $key !== 'short_description' and $key !== 'image' and $key !== 'parent_id' and $key !== 'description') and $value !== null) {
                            echo ' <tr><td>'.ucfirst(
                                str_replace("_", " ", $key)
                              ).'</td>';
                            echo ' <td>'.$value.'</td></tr>';
                        }
                    }
                    ?>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="2a">
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

    </div>
  </div>
<?php } ?>

  <?php if ($data[0]['has_similar_products'] == '1') { ?>
  <div class="container">
    <div class="row similar-row">
      <div class="product-similar col-xs-12">
        <!--Similar product-->
        <div class="similar-products-wrapper">
          <div class="similar-products">
            <h3 class="similar-products-title">UNSERE PRODUKTE</h3>
            <div class="row left-padding">
                <?php
                include 'application/connection.php';
                $routes = explode('/', $_SERVER['REQUEST_URI']);
                $last = end($routes);
                $current_pid_q = "SELECT parent_id FROM thermostat WHERE name='".$last."'";
                $current_pid = mysqli_fetch_assoc(
                  $mysqli->query($current_pid_q)
                );
                $q = "SELECT * FROM thermostat  WHERE parent_id='".$current_pid['parent_id']."' AND name NOT IN ('".$last."')";
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
      </div>
    </div>
  </div>
<?php } ?>
</main>
