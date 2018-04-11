<main>
  <?php
  $lang = getLanguage();

  if ($lang == 2) {
    echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT "FOR DEALERS"</h1>
  <div class="container">
    <h4>"FOR DEALERS" edited successfully</h4>
    <a class="orange-link" href="/for-dealers">Go to "FOR DEALERS" page</a>
  <br/>
    <a  class="orange-link"  href="/for-dealers/edit">Continue editing</a>
  </div>';
  }
  else {
    echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT "FÜR HÄNDLER"</h1>
  <div class="container">
    <h4>"FÜR HÄNDLER" edited successfully</h4>
    <a class="orange-link" href="/fur-handler">Go to "FÜR HÄNDLER" page</a>
  <br/>
    <a  class="orange-link"  href="/fur-handler/edit">Continue editing</a>
  </div>';
  }
  ?>
</main>
