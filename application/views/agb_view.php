<main>
  <h1 class="page-header container text-capitalize left-padding">
        <?php
    if (isset($data['name'])) {
      echo $data['name'];
    }

    ?>
  </h1>
  <div class="container left-padding box-small-margin">
    <?php
    if (isset($data['info'])) {
      echo $data['info'];
    }

    ?>
  </div>
</main>