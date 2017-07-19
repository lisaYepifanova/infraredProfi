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
        foreach ($data['comparison_img'] as $row) {
            echo '<img class="comparison-img" src="'.IMAGEPATH.$row.'">';
        }
        ?>
    </div>
  </div>
  <div class="container right-padding">
    <div class="description-img-scheme box-mid-margin text-center">
        <?php
        foreach ($data['scheme_img'] as $row) {
            echo '<img class="scheme-img" src="'.IMAGEPATH.$row.'">';
        }
        ?>
    </div>
  </div>

</main>
