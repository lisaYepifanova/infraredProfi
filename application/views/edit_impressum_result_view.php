<main>


  <?php
  $lang = getLanguage();


  if ($lang == '2') {
    echo ' 
   <h1 class="page-header container hsmall text-capitalize left-padding">EDIT
    IMPRINT</h1>
  <div class="container">
    <h4>Imprint edited successfully</h4>
    <a class="orange-link" href="/imprint">Go to "Imprint" page</a>
  <br/>
    <a  class="orange-link"  href="/imprint/edit">Continue editing</a>
  </div>';
  }
  else {
        echo ' 
   <h1 class="page-header container hsmall text-capitalize left-padding">EDIT
    IMPRESSUM</h1>
  <div class="container">
    <h4>"IMPRESSUM" edited successfully</h4>
    <a class="orange-link" href="/impressum">Go to "IMPRESSUM" page</a>
  <br/>
    <a  class="orange-link"  href="/impressum/edit">Continue editing</a>
  </div>';
  }

  ?>
</main>