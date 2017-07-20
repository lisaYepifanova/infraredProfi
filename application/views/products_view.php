<main>

  <h1 class="page-header container text-capitalize">GALLERY</h1>

  <div class="gallery container right-padding">
    <div class='row'>
        <?php
          foreach ($data as $row) {
            echo '<a href="'.$row['link'].'" class="col-xs-6 col-sm-4 col-md-3 product-item">';
            echo '<div class="product-img" style="background-image:url('.IMAGEPATH.$row['main_img'].')"></div>';
            echo '<h4 class="product-name">'.$row['name'].'</h4>';
            echo '</a>';
          }
        ?>
    </div>
  </div>

</main>
