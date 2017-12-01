<main class="about-us-page">

  <h1 class="page-header container text-capitalize left-padding">ÜBER UNS</h1>

  <div class="about-us-right-image container box-same-vmargin left-padding">
    <div class="row">
      <div class="about-us-image col-xs-7">
        <?php
        echo '<img src="' . IMAGEPATH . $data['mission_img'] . '" alt="">';
        ?>
      </div>
      <div class="about-us-text col-xs-5">
        <h4 class="about-us-text-title">MISSION</h4>
        <p class="about-us-text-description">
          <?php
          echo $data['mission_text'];
          ?>
        </p>
      </div>


    </div>
  </div>

  <div class="about-us-left-image container box-same-vmargin left-padding">
    <div class="row">
      <div class="about-us-image  col-xs-7">
        <?php
        echo '<img src="' . IMAGEPATH . $data['vision_img'] . '" alt="">';
        ?>
      </div>

      <div class="about-us-text  col-xs-5">
        <h4 class="about-us-text-title">VISION</h4>
        <p class="about-us-text-description">
          <?php
          echo $data['vision_text'];
          ?>
        </p>
      </div>
    </div>
  </div>

  <div class="about-us-description-wrapper container left-padding">
    <div class="about-us-description">
      <h4 class="left-padding">ÜBER UNS</h4>
      <?php
      echo '<p class="about-us-paragraph">' . $data['about_us_description'] . '</p>';
      ?>
    </div>
  </div>


</main>
