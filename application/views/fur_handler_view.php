<main id="fur-handler-page">

  <h1 class="page-header container hsmall text-capitalize left-padding">FÜR
    HÄNDLER</h1>


  <div class="registration-top-block">
    <?php
    echo '<h3 class="container  left-padding">' . $data['main_info']['top_block'] . '</h3>';
    ?>
  </div>

  <div class="container left-padding">
    <div class="registration-leistungen-wrapper">
      <h3 class="leistungen-header"> <?php echo $data['main_info']['service_title']; ?></h3>
      <div class="registration-leistungen"
           style="background-image: url(<?php echo IMAGEPATH . $data['main_info']['service_bg'] ?>)">
        <?php
        foreach ($data['services'] as $row) {
          echo '<div class="leistungen-item"><div class="leistungen-item-img-wrap"><div class="leistungen-item-img" style="background-image: url(' . IMAGEPATH . $row['icon'] . ')"></div></div>';
          echo '<div class="leistungen-item-description">' . $row['description'] . '</div></div>';
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
              <div class="property-item-image" style="background-image: url(' . IMAGEPATH . $row['icon'] . ')"></div>
              <h4 class="property-item-title">' . $row['title'] . '</h4>
              <p class="property-item-description">' . $row['description'] . '</p>
              </div>';

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
      <div class="row">
        <div class="form-group col-sm-6 col-xs-12 light-text ">
          Please fill in all the fields:
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6 col-xs-12">
          <label for="name">Ihr Name:</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group col-sm-6 col-xs-12">
          <label for="telephone">Ihre Telefonnummer:</label>
          <input type="tel" class="form-control" id="telephone"
                 name="telephone">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6 col-xs-12">
          <label for="bundesland">Bundesland:</label>
          <select class="form-control" id="country" name="bundesland">
            <option selected disabled></option>
            <?php
            foreach ($data['bundesland'] as $row) {
              echo '<option>' . $row['name'] . '</option>';
            }
            ?>

          </select>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
          <label for="email">Ihre Email:</label>
          <input type="email" class="form-control" id="email"
                 name="email">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-xs-12">
          <label for="ihre_nachricht">Ihre Nachricht:</label>
          <textarea class="form-control" rows="4" id="ihre_nachricht"
                    name="ihre_nachricht"></textarea>
        </div>
      </div>
      <div class="row text-center">
        <button type="submit" class="btn">ANFRAGE SENDEN</button>
      </div>
    </form>
  </div>
</main>
