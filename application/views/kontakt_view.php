<main>
  <h1 class="page-header container text-capitalize">KONTAKT</h1>

  <div class="container contacts-info-wrapper box-mid-margin right-padding">

    <div class="company-names">
      <h5 class="container-info-title"><?php echo $data['company_name'] ?></h5>
      <h5 class="container-info-title"><?php echo $data['second_company_name'] ?></h5>
    </div>

    <div class="contact-main-info">
        <?php
        foreach ($data['main_info'] as $row) {
            echo '<p class="main-info-item">'.$row.'</p>';
        }
        ?>
    </div>
    <div class="copyright">
      <h5 class="container-info-title">Copyright ©</h5>
      <div class="copyright-info-text"><?php echo $data['copyright'] ?></div>
    </div>

    <div class="externe_links">
      <h5 class="container-info-title">Externe Links</h5>
      <div class="copyright-info-text"><?php echo $data['externe_links'] ?></div>
    </div>

    <div class="erklarung">
      <h5 class="container-info-title">Erklärung</h5>
      <div class="copyright-info-text"><?php echo $data['erklarung'] ?></div>
    </div>
  </div>

  <iframe
      src=" <?php echo $data['map'] ?>"
      class="gmap" allowfullscreen></iframe>
</main>
