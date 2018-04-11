<main>
  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT
    PRODUCT</h1>
  <div class="container">
    <h4>Product added successfully</h4>
    <?php
    $lang = getLanguage();

    if ($lang == '2') {
      echo '<a class="orange-link" href="/products">Go to Products page</a>';
    }
    else {
      echo '<a class="orange-link" href="/produkte">Go to Produkte page</a>';
    }
    ?>
    <br/>
    <a class="orange-link" href="/product/add">Add new product</a>
  </div>
</main>
