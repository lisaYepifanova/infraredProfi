<main>

  <h1 class="page-header container hsmall text-capitalize">TECHNOLOGY</h1>

  <div class="container right-padding">
    <div class="technology-description box-mid-margin">
        <?php
        foreach ($data['description_before'] as $row) {
            echo '<p class="description-before-items">'.$row.'</p>';
        }
        ?>
    </div>

    <div class="description-img-wrapper box-mid-margin text-center">
        <?php
        foreach ($data['description_image'] as $row) {
            echo '<img class="description-img" src="'.IMAGEPATH.$row.'">';
        }
        ?>
    </div>

    <div class="technology-description box-mid-margin">
        <?php
        foreach ($data['description_after'] as $row) {
            echo '<p class="description-after-items">'.$row.'</p>';
        }
        ?>
    </div>
  </div>
  <div class="description-img-comparison-wrapper ">
    <div class="description-img-comparison box-mid-margin text-center container right-padding">
        <?php
          echo '<div class="row comparison-row">';
          /*image*/
          echo '<div class="comparison-img col-sm-6">
                <h3 class="comparison-title">'.$data['infra_title'].'</h3>';
            echo '<img class="" src="'.IMAGEPATH.$data['comparison_infra'].'">';
            echo '</div>';

            /*text*/
            echo '<div class="comparison-text-wrapper col-sm-6">
                    <p class="comparison-text">'.$data['infra_text'].'</p></div>';
            echo '</div>';

            echo '<div class="row comparison-row">';


            /*image*/
            echo '<div class="comparison-img col-sm-6">
                  <h3 class="comparison-title">'.$data['convect_title'].'</h3>';

            echo '<img class="" src="'.IMAGEPATH.$data['comparison_convect'].'">';
            echo '</div>';
            /*text*/
            echo '<div class="comparison-text-wrapper col-sm-6">
                    <p class="comparison-text">'.$data['convect_text'].'</p></div>';



            echo '</div>';

        ?>
    </div>
  </div>
  <div class="container right-padding">
    <div class="description-img-scheme box-mid-margin text-center">
        <?php
          echo '<div class="infrared-house-wrapper col-sm-6">';
            echo '<h3 class="infra-house-title">'.$data['infra_house_title'].'</h3>';
            echo '<img src="'.IMAGEPATH.$data['infra_house_image'].'" class="infra-house-img house-img">';
            echo '<p class="infra-house-description house-description">'.$data['infra_house_description'].'</p>';
          echo '</div>';

          echo '<div class="convect-house-wrapper col-sm-6">';
            echo '<h3 class="convect-house-title">'.$data['convect_house_title'].'</h3>';
            echo '<img src="'.IMAGEPATH.$data['convect_house_image'].'" class="convect-house-img house-img">';
            echo '<p class="convect-house-description house-description">'.$data['convect_house_description'].'</p>';
          echo '</div>';
        ?>
    </div>
  </div>

</main>
