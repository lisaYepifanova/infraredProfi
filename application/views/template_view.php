<?php include_once 'application/auth.php'; ?>
<!doctype html>
<html lang="de">
<?php
$pageTitle = "Infrared24";
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
    <?php
    if (!empty($_SERVER['REQUEST_URI'])) {
      $routes = explode('/', $_SERVER['REQUEST_URI']);
      $last = end($routes);
      $pageTitle = mb_convert_case(
        preg_replace('/[^\w\s]/u', ' ', $last),
        MB_CASE_TITLE,
        "UTF-8"
      );
    }

    if ($pageTitle !== 'Produkte' and $content_view == 'product_view.php') {
      echo $pageTitle . ' – stilvolle Infrarotheizung direkt vom Fachhändler';
    }
    else {
      echo $pageTitle;
    }
    ?>
  </title>
  <?php
  echo '
      <link rel="apple-touch-icon" href="' . ROOTPATH . 'apple-touch-icon.png">
      <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
      <link rel="stylesheet" href="' . CSSPATH . 'normalize.min.css">
      <link rel="stylesheet" href="' . CSSPATH . 'style.min.css">
      <link rel="stylesheet" href="' . CSSPATH . 'slick.min.css">
      <link rel="stylesheet" href="' . CSSPATH . 'slick-theme.min.css">
      ';
  ?>
  <meta name="keywords" content="Infrared Profi, Infrarot Profi, Heizung,
Infrarot, Infrarotstrahler, Infrarotheizung, Heizungssystem,
Heizsystem , Infrarotwärme, Infrarotstrahlen, Infrarot Wellen ,
Heizstrahler, Wärmestrahlung, Strahlenwärme , Haustechnik ,
Elektroheizung, Heizen mit Strom, Stromheizung , Infrarot Badheizung,
Handtuchheizung , Wandheizsystem , Glaskeramik , Glasheizung ">

  <?php
  if ($pageTitle !== 'Produkte' and $content_view == 'product_view.php') {
    echo '<meta name="description" content="' . $pageTitle . ' von
InfraRed24.com: ✔ elegant ✔ wirtschaftlich ✔ umweltschonend ✔ kindersicher. Jetzt
entdecken!">';
  }
  ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <?php

  echo '<script src="' . LIBPATH . 'ckeditor/ckeditor.js"></script>';
  ?>

</head>
<body>

<header>
  <div class="header-wrapper container">
    <a class="left-panel aside-panel" href="#asideNavMenu" data-toggle="modal">

      <div class="menu-link-button">
        <div class="menu-link">
          <span class="menu-link-line line1"></span>
          <span class="menu-link-line line2"></span>
          <span class="menu-link-line line3"></span>
        </div>

      </div>
    </a>

    <div class="header-items-wrapper">
      <div class="header-items">
        <?php
        foreach ($default['header_links'] as $row) {
          echo '<a href="' . $row['link'] . '" class="header-link ">' . $row['title'] . '</a>';
        }
        ?>
      </div>
    </div>

    <div class="site-logo-wrapper">
      <?php
      echo '<a href="/"><img src="' . IMAGEPATH . $default['logo'][0]['site_logo'] . '" alt="logo"></a>'
      ?>
    </div>
  </div>
</header>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser.
  Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->


<?php
include 'application/views/' . $content_view;
?>

<div id="contactBlock" class="contacts container box-same-vmargin left-padding">
  <div class="row">
    <?php
    $index = 1;
    foreach ($default['contacts'] as $row) {
      echo '<div class="contact-item-wrapper col-xs-3  text-center ">
                    <div class="contact-item contact-item' . $index . '">
                      <img class="content-item-icon" src="' . IMAGEPATH . $row['icon'] . '" alt="contact">';
      if ($row['name'] == 'phone') {
        echo '<div class="phone-wrapper">';
        foreach ($default['phones'] as $phone_row) {
          echo '<a href="' . $phone_row['tel'] . '" class="contact-item-value phone-value">' . $phone_row['text'] . '</a>';
        }
        echo '</div>';
      }
      else {
        echo '<a href="' . $row['link'] . '" class="contact-item-value">' . $row['value'] . '</a>';
      }
      echo '
                   </div>
                  </div>';
      $index = $index + 1;
    }
    ?>
  </div>
</div>

<footer id="footer" class="footer text-center">
  <div class="footer-links-wrapper container">
    <div class="footer-left-side col-xs-6">
      <div class="footer-links">
        <div class="footer-link-row row">
          <?php
          if (!empty($default['footer_links'])) {
            foreach ($default['footer_links'] as $row) {
              echo '<a href="' . $row['link'] . '" class="footer-link col-sm-4">' . $row['title'] . '</a>';
            }
          }
          ?>
        </div>
        <div class="footer-link-row row">
          <?php
          if (isAuth()) {
            echo '<a class="footer-link col-sm-4" href="/user">' . getLogin() . '</a>';

          }
          else {
            echo '<a class="footer-link col-sm-4" href="/login">Sign in</a>';
          }
          ?>


          <?php
          echo '<div class="col-sm-4 footer-link"><a target="_blank" href="https://www.facebook.com/infrared24" class=" social-link"><img src="' . IMAGEPATH . 'fb.png" alt="facebook link"></a>
         <a href="https://twitter.com/" class="social-link"><img src="' . IMAGEPATH . 'twitter.png" alt="twitter link"></a></div>';
          ?>
        </div>
      </div>
    </div>
    <div class="footer-right-side col-xs-6">
      <div class="footer-links footer-service-links ">
        <div class="footer-link-row">
          <?php
          foreach ($default['footer_service_links'] as $row) {
            echo '<a href="' . $row['link'] . '" class="footer-link col-sm-4">' . $row['title'] . '</a>';
          }
          ?>
        </div>
      </div>
      <div class="footer-link col-sm-4 footer-cp">© 2017 InfraRed24 GmbH</div>
    </div>
  </div>
</footer>

<!-- Modal -->
<div id="asideNavMenu" class="modal fade in aside-nav-menu"
     style="display: none;">
  <div class="modal-dialog aside-modal-dialog">
    <div class="modal-bg"></div>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">›
        </button>
        <h5 class="modal-title">
          <a class="lang-link">DE</a>
        </h5>
        <h5 class="modal-title profile-links">
          <?php
          if (isAuth()) {
            echo '<a class="prof-link" href="/user">' . getLogin() . '</a>';

          }
          else {
            echo '<a class="prof-link" href="/login">Sign in</a>';
          }
          ?>

        </h5>
      </div>
      <div class="modal-body">
        <div class="menu-items-wrapper">
          <?php
          foreach ($default['modal_menu'] as $row) {
            echo '<h4 class="menu-item text-center"><a href="' . $row['link'] . '" class="menu-item-link">' . $row['title'] . '</a></h4>';
          }
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <?php
        echo '<a target="_blank" href="https://www.facebook.com/infrared24" class="social-link"><img src="' . IMAGEPATH . 'fb.png" alt="facebook link"></a>
          <a href="https://twitter.com/" class="social-link"><img src="' . IMAGEPATH . 'twitter.png" alt="twitter link"></a>';
        ?>


      </div>
    </div>
  </div>
</div>

<?php

?>


<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>


<?php
echo '
  <script src="' . JSPATH . 'vendor/modernizr-2.8.3.min.js"></script>
  <script src="' . JSPATH . 'vendor/jquery-1.12.0.min.js"></script>
  <script src="' . JSPATH . 'vendor/jquery.foggy.min.js"></script>
  
<script src="' . LIBPATH . 'slick/slick/slick.min.js"></script>
  <script src="' . JSPATH . 'vendor.min.js"></script>
  <script src="' . JSPATH . 'build.min.js"></script>
  <script src="' . JSPATH . 'vendor/google-analytics.js"></script>';

?>


</body>
</html>
