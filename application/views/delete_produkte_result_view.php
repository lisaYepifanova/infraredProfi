<main>
  <h1 class="page-header container hsmall text-capitalize left-padding">DELETE PRODUCT</h1>

  <div class="container">
    <h4> deleted successfully</h4>
    <?php
      $lang = getLanguage();

      if($lang == 2) {
        echo '<a class="orange-link" href="/products">Go to Products page</a>';
      } else {
        echo '<a class="orange-link" href="/produkte">Go to Produkte page</a>';
      }
    ?>

  </div>
</main>
