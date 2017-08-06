<main>

  <h1 class="page-header container hsmall text-capitalize">FÜR HÄNDLER</h1>


  <div class="registration-top-block right-padding">
      <?php
      echo '<h3>'.$data['main_info']['top_block'].'</h3>';
      ?>
  </div>

  <div class="container right-padding">
    <div class="registration-leistungen-wrapper">
      <h3> <?php echo $data['main_info']['service_title']; ?></h3>
      <div class="registration-leistungen"
           style="background-image: url(<?php echo IMAGEPATH.$data['main_info']['service_bg'] ?>)">
          <?php
          foreach ($data['services'] as $row) {
              echo '<div class="leistungen-item"><div class="leistungen-item-img-wrap"><div class="leistungen-item-img" style="background-image: url('.IMAGEPATH.$row['icon'].')"></div></div>';
              echo '<div class="leistungen-item-description">'.$row['description'].'</div></div>';
          }
          ?>
      </div>
    </div>

    <div class="registration-description">
        <?php echo $data['main_info']['description']; ?>
    </div>
  </div>

  <div class="registration-properties">
    <div class="registration-properties-row">
      <div class="properties-side left-side"
           style="background-image: url(<?php echo IMAGEPATH.$data['main_info']['angebot_bg'] ?>)"></div>
      <div class="properties-side right-side-wrapper">
      <div class="properties-side right-side">

          <?php
          $index = 1;
          echo '<h3 class="property-title">'.$data['main_info']['angebot_title'].'</h3>';

          foreach ($data['angebot'] as $row) {
              echo '<div class="property-item property-item'.$index.'">
              <div class="property-item-image" style="background-image: url('.IMAGEPATH.$row['icon'].')"></div>
              <h4 class="property-item-title">'.$row['title'].'</h4>
              <p class="property-item-description">'.$row['description'].'</p>
              </div>';

              $index = $index + 1;
          }
          ?>

      </div>
    </div>
    </div>
  </div>

  <div class="registration-form registration-form-sent container right-padding box-same-vmargin">
    <h3>REQUEST SENT SUCCESSFULLY</h3>
  </div>
</main>
