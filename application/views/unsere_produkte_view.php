<main>

  <h1 class="page-header container text-capitalize">UNSERE PRODUKTE</h1>

  <div class="gallery container right-padding">
    <div class='row'>
        <?php
          if (!empty($data)) {
            foreach ($data as $row) {
              if ($_SERVER['REQUEST_URI'] == "/products/") {
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
