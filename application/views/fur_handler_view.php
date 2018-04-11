<main id="fur-handler-page">

  <h1 class="page-header container hsmall text-capitalize left-padding"><?php echo $data['main_info']['title']; ?></h1>


  <div class="registration-top-block">
    <?php
    echo '<div class="container  left-padding">' . $data['main_info']['top_block'] . '</div>';
    ?>
  </div>

  <div class="container left-padding">
    <div class="registration-leistungen-wrapper">
      <h3 class="leistungen-header"> <?php echo $data['main_info']['service_title']; ?></h3>
      <div class="registration-leistungen"
           style="background-image: url(<?php echo IMAGEPATH . $data['main_info']['service_bg'] ?>)">
        <?php
        $lang = getLanguage();
        foreach ($data['services'] as $row) {
          echo '<div class="leistungen-item"><div class="leistungen-item-img-wrap"><div class="leistungen-item-img" style="background-image: url(' . IMAGEPATH . $row['icon'] . ')"></div></div>';

          if ($lang == 1) {
            echo '<div class="leistungen-item-description">' . $row['description'] . '</div></div>';
          }
          else {
            if ($lang == 2) {
              echo '<div class="leistungen-item-description">' . $row['eng_description'] . '</div></div>';
            }
          }

        }
        ?>
      </div>
    </div>

    <div class="registration-description">
      <?php echo '<h3>' . $data['main_info']['description'] . '</h3>'; ?>
    </div>
  </div>

  <div class="registration-properties">
    <div class="registration-properties-row">
      <div class="properties-side left-side">
        <div class="left-side-bg"
             style="background-image: url(<?php echo IMAGEPATH . $data['main_info']['angebot_bg'] ?>)"></div>

      </div>
      <div class="properties-side right-side-wrapper">
        <?php
        echo '<h3 class="property-title registration-property-title left-padding">' . $data['main_info']['angebot_title'] . '</h3>';
        ?>
        <div class="properties-side right-side">

          <?php
          $index = 1;

          foreach ($data['angebot'] as $row) {
            echo '<div class="property-item property-item' . $index . '">
              <div class="property-item-image" style="background-image: url(' . IMAGEPATH . $row['icon'] . ')"></div>';

            if ($lang == 1) {
              echo '<h4 class="property-item-title">' . $row['title'] . '</h4>
              <p class="property-item-description">' . $row['description'] . '</p>';
            }
            else {
              if ($lang == 2) {
                echo '<h4 class="property-item-title">' . $row['eng_title'] . '</h4>
              <p class="property-item-description">' . $row['eng_description'] . '</p>';
              }
            }


            echo ' </div>';

            $index = $index + 1;
          }
          ?>

        </div>
      </div>
    </div>
  </div>

  <div
      class="fur-handler-form registration-form container left-padding box-same-vmargin">
    <div class="registration-form-title text-center">
      <?php echo $data['main_info']['form_title']; ?>

    </div>
    <form role="form" action="" method="post">
      <?php echo $data['main_info']['form']; ?>

      <div class="row text-center">
        <button type="submit" class="btn" disabled="disabled">

          <?php echo $data['main_info']['button']; ?>

        </button>
      </div>
    </form>

  </div>
</main>
