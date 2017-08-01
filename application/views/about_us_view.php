<main class="about-us-page">

  <h1 class="page-header container text-capitalize">ABOUT US</h1>

  <div class="about-us-right-image container box-same-vmargin right-padding">
    <div class="row">
      <div class="about-us-text col-xs-5">
        <h4 class="about-us-text-title">MISSION</h4>
        <p class="about-us-text-description">
            <?php
                echo $data['texts']['mission_text'];
            ?>
        </p>
      </div>

      <div class="about-us-image col-xs-7">
        <?php
          echo '<img src="'.IMAGEPATH.$data['images']['mission_img'].'" alt="">';
        ?>
      </div>
    </div>
  </div>

  <div class="about-us-left-image container box-same-vmargin right-padding">
    <div class="row">
      <div class="about-us-image col-xs-7">
        <?php
          echo '<img src="'.IMAGEPATH.$data['images']['vision_img'].'" alt="">';
        ?>
      </div>

      <div class="about-us-text col-xs-5">
        <h4 class="about-us-text-title">VISION</h4>
        <p class="about-us-text-description">
          <?php
                echo $data['texts']['vision_text'];
            ?>
        </p>
      </div>
    </div>
  </div>

  <div class="about-us-description-wrapper container right-padding">
    <div class="about-us-description">
         <?php
        foreach ($data['about_us_description'] as $row) {
            echo '<p class="about-us-paragraph">'.$row['paragraph'].'</p>';
        }
        ?>
    </div>
  </div>

  <?php
    include("application/views/fragments/philosophy.php");
  ?>

</main>
