<main>

  <h1 class="page-header container hsmall text-capitalize">TECNOLOGIE</h1>

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


      <?php
      if ($data['description_after'] !== '' and !empty($data['description_after'])) {
          echo '<div class="technology-description box-mid-margin">
                      <p class="description-after-items">'.$data['description_after'].'</p></div>';

      }
      ?>

  </div>
  <div class="description-img-comparison-wrapper ">
    <div
        class="description-img-comparison box-mid-margin text-center container right-padding">
        <?php
        /*first item*/
        echo '<div class="row">';

        echo '<div class="comparison-title col-sm-12"><h3 class="comparison-title comparison-title-left col-xs-12 col-sm-6">'.$data['infra_title'].'</h3></div>';

        echo '</div><div class="row comparison-row">';
        /*image*/
        echo '<div class="comparison-img col-sm-6">';
        echo '<img class="" src="'.IMAGEPATH.$data['comparison_infra'].'">';
        echo '</div>';

        /*text*/
        echo '<div class="comparison-text-wrapper  comparison-wrapper-1 col-sm-6">
                    <p class="comparison-text">'.$data['infra_text'].'</p>
                    <p class="arrow-down 	glyphicon glyphicon-menu-down"></p></div>';
        echo '</div>';

        /*second item*/
        echo '<div class="row ">';

        echo '<div class="comparison-title col-sm-12"><h3 class="comparison-title comparison-title-right col-xs-12 col-sm-6">'.$data['convect_title'].'</h3></div>';

        echo '</div><div class="row comparison-row">';
        /*image*/
        echo '<div class="comparison-img col-sm-6">';

        echo '<img class="" src="'.IMAGEPATH.$data['comparison_convect'].'">';
        echo '</div>';
        /*text*/
        echo '<div class="comparison-text-wrapper comparison-wrapper-2 col-sm-6">
                    <p class="comparison-text">'.$data['convect_text'].'</p>
                    <p class="arrow-down 	glyphicon glyphicon-menu-down"></p></div>';


        echo '</div>';

        ?>
    </div>
  </div>
  <div class="container right-padding">
    <h3 class="description-scheme-title text-center"><?php echo $data['scheme_title']; ?></h3>
    <div class="description-img-scheme box-mid-margin text-center">
        <?php
        echo '<div class="convect-house-wrapper col-sm-6">';
        echo '<h3 class="convect-house-title">'.$data['convect_house_title'].'</h3>';
        echo '<img src="'.IMAGEPATH.$data['convect_house_image'].'" class="convect-house-img house-img">';
        echo '<div class="convect-house-description house-description comparison-text-wrapper"><p class="comparison-text">'.$data['convect_house_description'].'</p>
<p class="arrow-down 	glyphicon glyphicon-menu-down text-center"></p></div></div>';
        echo '</div>';

        echo '<div class="infrared-house-wrapper col-sm-6 ">';
        echo '<h3 class="infra-house-title">'.$data['infra_house_title'].'</h3>';
        echo '<img src="'.IMAGEPATH.$data['infra_house_image'].'" class="infra-house-img house-img">';
        echo '<div class="infra-house-description house-description comparison-text-wrapper"><p class="comparison-text">'.$data['infra_house_description'].'</p>
<p class="arrow-down 	glyphicon glyphicon-menu-down text-center"></p></div></div>';
        echo '</div>';
        ?>
    </div>
  </div>

</main>
