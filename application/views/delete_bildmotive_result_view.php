<main>
  <h1 class="page-header container hsmall text-capitalize left-padding">DELETE
    BILDMOTIVE CATEGORY</h1>

  <div class="container">
    <h4> deleted successfully</h4>
    <a class="orange-link" href="/produkte/bildmotive">Go to bildmotive page</a>
  </div>
  <div class="container">
    <?php

    foreach ($data as $row) {
      echo '<div>' . $row . '</div>';
    }
    ?>
  </div>
</main>
