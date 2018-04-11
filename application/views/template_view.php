<?php
include_once 'application/auth.php';
$lang = getLanguage();
?>
<!doctype html>
<html lang="de">
<?php
if ($lang == 2) {
  $pageTitle = "InfraRed 24 - Infrared heating systems, German manufacturer, environmentally friendly";
}
else {
  $pageTitle = "InfraRed 24 - Infrarot Heizsysteme, Deutscher Hersteller, umweltschonend";
}

?>
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->

  <!--
  <script async
          src="https://www.googletagmanager.com/gtag/js?id=UA-112408135-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }

      gtag('js', new Date());

      gtag('config', 'UA-112408135-1');
  </script>
-->
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

    if ($pageTitle !== 'Produkte' and $pageTitle !== 'Products' and $content_view == 'product_view.php') {
      if ($lang == 2) {
        echo $pageTitle . ' – stylish infrared heating directly from the dealer';
      }
      else {
        echo $pageTitle . ' – stilvolle Infrarotheizung direkt vom Fachhändler';
      }

    }
    else {
      echo $pageTitle;
    }
    ?>
  </title>
  <?php
  echo '
      <link rel="apple-touch-icon" href="' . ROOTPATH . 'apple-touch-icon.png">
  
      <link rel="stylesheet" href="' . CSSPATH . 'normalize.min.css">
      <link rel="stylesheet" href="' . CSSPATH . 'style.min.css">
      <link rel="stylesheet" href="' . LIBPATH . 'slick/slick/slick.css">
      <link rel="stylesheet" href="' . LIBPATH . 'slick/slick/slick-theme.css">
      ';

  if ($lang == 2) {
    echo '<meta name="keywords" content="Infrared Profi, Infrarot Profi, Heater,
Infrared, infrared heater, infrared heating, heating system,
Heating system, infrared heat, infrared rays, infrared waves,
Radiant heaters, radiant heat, radiant heat, building services,
Electric heating, heating with electricity, electric heating, infrared bath heating,
Towel heating, wall heating system, ceramic glass, glass heating ">';


    if ($pageTitle !== 'Products' and $content_view == 'product_view.php') {
      echo '<meta name="description" content="' . $pageTitle . ' from
      InfraRed24.com: ✔ elegant ✔ economical ✔ environmentally friendly ✔ childproof. Now discover!">';
    }
  }
  else {
    echo '<meta name="keywords" content="Infrared Profi, Infrarot Profi, Heizung,
Infrarot, Infrarotstrahler, Infrarotheizung, Heizungssystem,
Heizsystem , Infrarotwärme, Infrarotstrahlen, Infrarot Wellen ,
Heizstrahler, Wärmestrahlung, Strahlenwärme , Haustechnik ,
Elektroheizung, Heizen mit Strom, Stromheizung , Infrarot Badheizung,
Handtuchheizung , Wandheizsystem , Glaskeramik , Glasheizung ">';


    if ($pageTitle !== 'Produkte' and $content_view == 'product_view.php') {
      echo '<meta name="description" content="' . $pageTitle . ' von
InfraRed24.com: ✔ elegant ✔ wirtschaftlich ✔ umweltschonend ✔ kindersicher. Jetzt
entdecken!">';
    }
  }

  ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <?php

  echo '<script src="' . LIBPATH . 'ckeditor/ckeditor.js"></script>';


  ?>
  <script>
      function setCookieV(value, path) {
          var date = new Date(new Date().getTime() + 7 * 24 * 60 * 60 * 1000);
          var updatedCookie = "language=" + value + "; expires=" + date.toUTCString() + "; path=/;";

          document.cookie = updatedCookie;
          location.reload();
          window.location = path;
      }
  </script>

</head>
<body>

<header>
  <div class="header-top-line">
    <?php

    if ($lang == 2) {
      echo '<div class="header-top-line-content"><div class="top-phones">Phones: ';
    }
    else {
      echo '<div class="header-top-line-content"><div class="top-phones">Telefon: ';
    }


    $index = 0;
    if (isset($default['header_phones'])) {
      foreach ($default['header_phones'] as $phone_row) {
        echo '<a href="tel:' . $phone_row['tel'] . '" class="contact-item-value header-phone-value">' . $phone_row['text'] . '</a>';
        $index += 1;
        if (count($default['header_phones']) > $index) {
          echo ',  ';
        }
      }
    }


    echo '</div>';
    ?>

    <div class="top-lang">

      <?php
      $de_path = '';
      $en_path = '';
      if (isset($default['route'])) {
        foreach ($default['route'] as $row) {
          $de_path = $de_path . '/' . $row['de'];
          $en_path = $en_path . '/' . $row['en'];
        }
      }

      ?>

      <form enctype="multipart/form-data" role="form" action="" method="post"
            id="lang_form_top">
        <?php
        if (isset($default['languages'])) {
          if (isset($_COOKIE)) {
            if (isset($_COOKIE["language"])) {
              $lang = $_COOKIE["language"];
            }
            else {
              $lang = '1';
            }
          }
          else {
            $lang = '1';
          }

          foreach ($default['languages'] as $row) {
            echo '<div class="lang-item ';

            if ($row['id'] == 2) {
              if (isset($en_path)) {
                $path = $en_path;
              }
              else {
                if (isset($de_path)) {
                  $path = $de_path;
                }
                else {
                  $path = "/";
                }
              }
            }
            else {
              if (isset($de_path)) {
                $path = $de_path;
              }
              else {
                if (isset($en_path)) {
                  $path = $en_path;
                }
                else {
                  $path = "/";
                }
              }
            }

            if ($lang == $row['id']) {
              echo ' selected ';
            }

            echo '">';
            echo '<input class="lang-checkbox" type="radio" name="lang" 
               id="lang-' . $row['id'] . '"
               value="' . $row['id'] . '"';
            if ($lang == $row['id']) {
              echo ' selected ';
            }

            echo '  onchange="setCookieV( ' . $row['id'] . ', \'' . $path . '\')">';
            echo '<label class="lang-link" for="lang-' . $row['id'] . '"><img alt=' . $row['name'] . ' src="' . IMAGEPATH . 'languages/' . $row['icon'] . '">' . $row['title'] . '</label>';
            echo '</div>';
          }
        }
        ?>
      </form>
    </div>

  </div>
  </div>
  <div class="header-wrapper ">
    <div class="site-logo-wrapper">
      <?php
      echo '<a href="/"><img src="' . IMAGEPATH . $default['logo'][0]['site_logo'] . '" alt="logo"></a>'
      ?>
    </div>


    <div class="header-menu-wrapper">
      <a class="left-panel aside-panel" href="#asideNavMenu"
         data-toggle="modal">

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

    </div>
    <div class="header-social-items-wrapper">
      <div class="header-social-items">
        <?php
                foreach ($default['social'] as $link) {
          echo '<a target="_blank" href="'.$link['link'].'" class="social-link"><img src="' . IMAGEPATH . $link['img'] .'" alt="'.$link['alt'].'"></a>';
        }
        ?>
      </div>
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
          echo '<a href="tel:' . $phone_row['tel'] . '" class="contact-item-value phone-value">' . $phone_row['text'] . '</a>';
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
    <div class="footer-left-side col-xs-6 col-sm-4">
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
                  foreach ($default['social'] as $link) {
          echo '<a target="_blank" href="'.$link['link'].'" class="social-link"><img src="' . IMAGEPATH . $link['img'] .'" alt="'.$link['alt'].'"></a>';
        }
          ?>
        </div>
      </div>
    </div>
    <div class="footer-right-side col-xs-6 col-sm-4">
      <div class="footer-links footer-service-links ">
        <div class="footer-link-row">
          <?php
          foreach ($default['footer_service_links'] as $row) {
            echo '<a href="' . $row['link'] . '" class="footer-link col-sm-4">' . $row['title'] . '</a>';
          }
          ?>
        </div>
      </div>
      <div class="footer-links footer-cp">© 2017 InfraRed24 GmbH</div>

    </div>
    <div class="footer-links footer-mit col-xs-6 col-sm-4"><a
          class="footer-mit-link"
          href="#mitgliedModal"
          data-toggle="modal"><img
            src="<?php echo IMAGEPATH . 'footer/mitglied.png'; ?>"></a></div>
  </div>
</footer>

<!-- Modal -->
<div id="asideNavMenu" class="modal fade in aside-nav-menu "
     style="display: none;">
  <div class="modal-dialog aside-modal-dialog">
    <div class="modal-bg"></div>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">›
        </button>
        <div class="menu-top-lang">
          <form enctype="multipart/form-data" role="form" action=""
                method="post" id="lang_form_modal">
            <?php
            if (isset($default['languages'])) {
              foreach ($default['languages'] as $row) {
                echo '<div class="lang-item ';

                if ($lang == $row['id']) {
                  echo ' selected ';
                }

                echo ' ">';
                echo '<input class="lang-checkbox" type="radio" name="lang" 
               id="lang-' . $row['id'] . '"';

                if ($lang == $row['id']) {
                  echo ' selected ';
                }

                echo ' value="' . $row['id'] . '"  onchange="setCookieV(' . $row['id'] . ', \'' . $path . '\')">';
                echo '<label class="lang-link" for="lang-' . $row['id'] . '"><img alt=' . $row['name'] . ' src="' . IMAGEPATH . 'languages/' . $row['icon'] . '">' . $row['title'] . '</label>';
                echo '</div>';
              }
            }
            ?>
          </form>
        </div>
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
        foreach ($default['social'] as $link) {
          echo '<a target="_blank" href="'.$link['link'].'" class="social-link"><img src="' . IMAGEPATH . $link['img'] .'" alt="'.$link['alt'].'"></a>';
        }
        ?>

      </div>
    </div>
  </div>
</div>


<div id="mitgliedModal" class="modal fade in mitglied-modal"
     style="display: none;">
  <div class="modal-dialog aside-modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close glyphicon glyphicon-remove"
                data-dismiss="modal" aria-hidden="true"></button>
        <?php

        if (isset($default['mitglied'])) {
          echo '<div>' . $default['mitglied']['info'] . '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<?php
echo '
  <script src="' . JSPATH . 'vendor/modernizr-2.8.3.min.js"></script>
  <script src="' . JSPATH . 'vendor/jquery-1.12.0.min.js"></script>
  <script src="' . JSPATH . 'vendor/jquery.foggy.min.js"></script>
  
  <script src="' . LIBPATH . 'slick/slick/slick.min.js"></script>
  <script src="' . JSPATH . 'vendor.js"></script>
  <script src="' . JSPATH . 'build.js"></script>';

?>


</body>
</html>
