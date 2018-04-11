<main>


    <?php
  $lang = getLanguage();


  if ($lang == '2') {
    echo '   <h1 class="page-header container hsmall text-capitalize left-padding">EDIT DATA PROTECTION</h1>
 <div class="container">
    <h4>Data protection edited successfully</h4>
    <a class="orange-link" href="/data-protection">Go to "Data protection" page</a>
  <br/>
    <a  class="orange-link"  href="/data-protection/edit">Continue editing</a>
  </div>';
  } else {
    echo '   <h1 class="page-header container hsmall text-capitalize left-padding">EDIT DATENSCHUTZ</h1>
 <div class="container">
    <h4>"DATENSCHUTZ" edited successfully</h4>
    <a class="orange-link" href="/datenschutz">Go to "DATENSCHUTZ" page</a>
  <br/>
    <a  class="orange-link"  href="/datenschutz/edit">Continue editing</a>
  </div>';
  }
  ?>

</main>