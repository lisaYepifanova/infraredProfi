<main class="product">

  <h1 class="page-header container text-capitalize left-padding left-padding"><?php echo $data['bildmotive_catalog'][0]['title']; ?></h1>

  <?php
  $lang = getLanguage();

  if (isAuth()) {
    echo '<div class="container produkte-del box-small-margin "><a href="' . $_SERVER['REQUEST_URI'] . '/edit"
           class="glyphicon glyphicon-pencil"> Edit bildmotive catalog</a></div>';
    echo '<div class="container produkte-del box-small-margin "><a href="' . $_SERVER['REQUEST_URI'] . '/add"
           class="glyphicon glyphicon-pencil"> Add new bildmotive category</a></div>';
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

  <div class=" container left-padding">

    <!-- Description of the product-->
    <div
        class="box-mid-margin product-full-description-wrapper">
      <?php

      echo '<div class="product-description product-full-description">' . $data['bildmotive_catalog'][0]['description'] . '</div>';
      echo '<p class="arrow-down 	glyphicon glyphicon-menu-down text-center"></p>';
      ?>
    </div>

    <div class='row'>
      <?php
      $lang =getLanguage();


      if (!empty($data['bildmotive'])) {
        foreach ($data['bildmotive'] as $row) {

          if ($lang == "2") {
            $link = $_SERVER['REQUEST_URI'] . '/' . $row['eng_name'];
          }
          else {
              $link = $_SERVER['REQUEST_URI'] . '/' . $row['name'];

          }

          echo '<a href="' . $link . '" class="col-xs-6 col-sm-4 col-md-4 product-item">';
          if ($lang == 2) {
            if($row['image']!==null) {
              echo '<div class="product-img" style="background-image:url(' . IMAGEPATH . 'products/bildmotive/' . $row['name'] . '/' . $row['image'] . ')"></div>';
            } else {
              echo '<div class="product-img"></div>';
            }

            echo '<h4 class="product-name">' . $row['eng_title'] . '</h4>';
          }
          else {
            echo '<div class="product-img" style="background-image:url(' . IMAGEPATH .  'products/bildmotive/' . $row['name'] . '/' . $row['image'] . ')"></div>';
            echo '<h4 class="product-name">' . $row['title'] . '</h4>';
          }


          echo '<p style="width:0; height:0; color: white;">' . $row['id'] . '</p>';
          echo '</a>';
        }
      }
      else {
        echo 'No results';
      }

      ?>
    </div>
  </div>
</main>

