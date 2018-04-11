<main>
  <h1 class="page-header container hsmall text-capitalize left-padding">ADD
    PRODUCT</h1>

  <?php
  $lang = getLanguage();

  if ($lang == 2) {
    echo ' <div class="container">
    <h4>Product added successfully</h4>
    <a class="orange-link" href="/products">Go to Products page</a>
  <br/>
    <a class="orange-link"  href="/product/add">Add new product</a>
  </div>';
  }
  else {
    echo ' <div class="container">
    <h4>Product added successfully</h4>
    <a class="orange-link" href="/produkte">Go to Produkte page</a>
  <br/>
    <a class="orange-link"  href="/product/add">Add new product</a>
  </div>';
  }
  ?>

</main>
