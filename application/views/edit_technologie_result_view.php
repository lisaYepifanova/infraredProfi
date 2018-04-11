<main>

  <?php
    $lang = getLanguage();

    if($lang == 2) {
      echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT "TECHNOLOGY"</h1>
  <div class="container">
    <h4>"TECHNOLOGY" edited successfully</h4>
    <a class="orange-link" href="/technology">Go to "TECHNOLOGY" page</a>
  <br/>
    <a  class="orange-link"  href="/technology/edit">Continue editing</a>
  </div>';
    } else {
            echo '  <h1 class="page-header container hsmall text-capitalize left-padding">EDIT "TECHNOLOGIE"</h1>
  <div class="container">
    <h4>"TECHNOLOGIE" edited successfully</h4>
    <a class="orange-link" href="/technologie">Go to "TECHNOLOGIE" page</a>
  <br/>
    <a  class="orange-link"  href="/technologie/edit">Continue editing</a>
  </div>';
    }
  ?>

</main>
