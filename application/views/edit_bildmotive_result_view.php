<main>

    <h1 class="page-header container hsmall text-capitalize left-padding">EDIT BILDMOTIVE</h1>
  <div class="container">
    <h4>Bildmotive edited successfully</h4>
    <?php
    $lang = getLanguage();

    if ($lang == '2') {
      echo '<a class="orange-link" href="/products/' . $data['save']['info'] . '">Go to Bildmotive page</a>';
    }
    else {
      echo '<a class="orange-link" href="/produkte/' . $data['save']['info'] . '">Go to Bildmotive page</a>';
    }
    ?>
  </div>


</main>
