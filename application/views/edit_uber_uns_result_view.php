<main class="about-us-page">







   <?php
  $lang = getLanguage();


  if ($lang == '2') {
    echo '   <h1 class="page-header container hsmall text-capitalize left-padding">EDIT "ABOUT US"</h1>

  <div class="container">
    <h4>"ABOUT" edited successfully</h4>
    <a class="orange-link" href="/about-us">Go to "ABOUT US" page</a>
  <br/>
    <a  class="orange-link"  href="/about-us/edit">Continue editing</a>
  </div>';
  }
  else {
    echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT "ÜBER UNS"</h1>

  <div class="container">
    <h4>"ÜBER UNS" edited successfully</h4>
    <a class="orange-link" href="/uber-uns">Go to "ÜBER UNS" page</a>
  <br/>
    <a  class="orange-link"  href="/uber-uns/edit">Continue editing</a>
  </div>';
  }

  ?>
</main>