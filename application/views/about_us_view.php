<main>

  <h1 class="page-header container">ABOUT US</h1>

  <div class="about-us-right-image container">
    <div class="row">
      <div class="about-us-text col-xs-5">
        <h4 class="about-us-text-title">MISSION</h4>
        <p class="about-us-text-description">
            <?php
                echo $data['mission_text'];
            ?>
        </p>
      </div>

      <div class="about-us-image col-xs-7"></div>
    </div>
  </div>

  <div class="about-us-left-image container">
    <div class="row">
      <div class="about-us-image col-xs-7"></div>

      <div class="about-us-text col-xs-5">
        <h4 class="about-us-text-title">VISION</h4>
        <p class="about-us-text-description">
          <?php
                echo $data['vision_text'];
            ?>
        </p>
      </div>
    </div>
  </div>

  <div class="about-us-description-wrapper container">
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
