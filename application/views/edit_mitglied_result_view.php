<main>

   <?php
  $lang = getLanguage();


  if ($lang == '2') {
    echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT MEMBER</h1>

  <div class="container">
    <h4>"MEMBER" edited successfully</h4>
    <a class="orange-link" href="/member">Go to "MEMBER" page</a>
  <br/>
    <a  class="orange-link"  href="/member/edit">Continue editing</a>
  </div>';
  }
  else {
    echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT MITGLIED</h1>

  <div class="container">
    <h4>"MITGLIED" edited successfully</h4>
    <a class="orange-link" href="/mitglied">Go to "MITGLIED" page</a>
  <br/>
    <a  class="orange-link"  href="/mitglied/edit">Continue editing</a>
  </div>';
  }

  ?>
</main>