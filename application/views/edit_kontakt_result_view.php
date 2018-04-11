<main>

  <?php
  $lang = getLanguage();

    if($lang == 2) {
      echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT CONTACTS</h1>

  <div class="container">
    <h4>"CONTACTS" edited successfully</h4>
    <a class="orange-link" href="/contact">Go to "CONTACTS" page</a>
  <br/>
    <a  class="orange-link"  href="/contact/edit">Continue editing</a>
  </div>';
    } else {
      echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT KONTAKT</h1>

  <div class="container">
    <h4>"KONTAKT" edited successfully</h4>
    <a class="orange-link" href="/kontakt">Go to "KONTAKT" page</a>
  <br/>
    <a  class="orange-link"  href="/kontakt/edit">Continue editing</a>
  </div>';
    }
  ?>


</main>