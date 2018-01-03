<main>

  <h1 class="page-header container text-capitalize left-padding"><?php echo strtoupper(
        $pageTitle
      ); ?></h1>
    <?php if ($pageTitle !== 'Produkte') { ?>
      <div class="product-menu-wrapper col-sm-3 left-padding">
        <div class="product-menu floating">
          <ul>
              <?php

              $data;
              $debug = true;
              $routes = explode('/', $_SERVER['REQUEST_URI']);
              $last = end($routes);

              echo '<h4><a class="product-menu-item" href="/produkte">UNSERE PRODUKTE</a></h4>';


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

                  echo '</li>';
              }
              ?>

          </ul>
        </div>
      </div>
    <?php } ?>
  <div class="gallery-product-page container box-m-mg-top">
    <div class='row'>
        <?php
        if (!empty($data['items'])) {
            foreach ($data['items'] as $row) {
                if ($_SERVER['REQUEST_URI'] == "/produkte/") {
                    $link = $_SERVER['REQUEST_URI'].$row['name'];
                } else {
                    $link = $_SERVER['REQUEST_URI'].'/'.$row['name'];
                }

                echo '<a href="'.$link.'" class="col-xs-6 col-sm-4 col-md-4 product-item">';
                echo '<div class="product-img" style="background-image:url('.IMAGEPATH.$row['image'].')"></div>';
                echo '<h4 class="product-name">'.$row['title'].'</h4>';
                echo '<p class="product-description">'.$row['short_description'].'</p>';
                echo '</a>';
            }
        } else {
            echo 'No results';
        }


        ?>
    </div>
  </div>

</main>
