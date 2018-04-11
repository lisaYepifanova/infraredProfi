<main>
  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT
    CATEGORY</h1>

  <div class="container">
    <h4>Category added successfully</h4>
    <?php
    if (isset($_COOKIE)) {
      if (isset($_COOKIE['language'])) {
        if ($_COOKIE['language'] == "2") {
          echo '<a class="orange-link" href="/products">Go to Products page</a><br/>
              <a  class="orange-link"  href="/products/add">Add new category</a>';
        }
        else {
          echo '<a class="orange-link" href="/produkte">Go to Produkte page</a><br/>
              <a  class="orange-link"  href="/produkte/add">Add new category</a>';
        }
      }

    }
    else {
      echo '<a class="orange-link" href="/produkte">Go to Produkte page</a><br/>
              <a  class="orange-link"  href="/produkte/add">Add new category</a>';
    }
    ?>


  </div>
</main>
