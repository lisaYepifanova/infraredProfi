<main>
  <h1 class="page-header container text-capitalize left-padding"><?php echo $data['name'] ?></h1>

  <div class="container contacts-info-wrapper box-mid-margin left-padding">

  <?php echo $data['info'] ?>
  </div>

  <iframe
      src=" <?php echo $data['map'] ?>"
      class="gmap left-padding" allowfullscreen></iframe>
</main>
