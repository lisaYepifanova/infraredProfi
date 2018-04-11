<main>



  <?php
  $lang = getLanguage();


  if ($lang == '2') {
    echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT
    CONDITIONS</h1>  <div class="container">
    <h4>CONDITIONS edited successfully</h4>
    <a class="orange-link" href="/conditions">Go to CONDITIONS page</a>
  <br/>
    <a  class="orange-link"  href="/conditions/edit">Continue editing</a>
  </div>';
  }
  else {
    echo '<h1 class="page-header container hsmall text-capitalize left-padding">EDIT
    AGB</h1>   <div class="container">
    <h4>"AGB" edited successfully</h4>
    <a class="orange-link" href="/agb">Go to "AGB" page</a>
  <br/>
    <a  class="orange-link"  href="/agb/edit">Continue editing</a>
  </div>';
  }

  ?>

</main>